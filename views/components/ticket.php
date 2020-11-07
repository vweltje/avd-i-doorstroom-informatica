<?php

function ticket($ticket) {
    global $user;

    $allowedActions = [];
    $moveActions = [];

    if ($ticket->status === 'NEW') {
        if (!$user->inGroup('employee')) {
            $allowedActions[] = 'edit';
            $allowedActions[] = 'delete';
        }
        if ($user->inGroup('manager')) {
            $allowedActions[] = 'approve';
        }
    } elseif ($ticket->status === 'APPROVED') {
        if ($user->inGroup('manager')) {
            $allowedActions[] = 'edit';
            $allowedActions[] = 'delete';
        } elseif ($user->inGroup('employee')) {
            $allowedActions[] = 'move';
            $moveActions[] = 'IN_PROGRESS';
        }
    } elseif ($ticket->status === 'IN_PROGRESS') {
        if ($user->inGroup('employee')) {
            $allowedActions[] = 'move';
            $moveActions[] = 'TODO';
            $moveActions[] = 'DONE';
        }
    } else {
        if ($user->inGroup('manager') || $user->inGroup('employee')) {
            $allowedActions[] = 'delete';
            $allowedActions[] = 'move';
            $moveActions[] = 'IN_PROGRESS';
            $moveActions[] = 'TODO';
        }
    }

    $actionStrings = array(
        'TODO' => 'todo',
        'IN_PROGRESS' => 'in progress',
        'DONE' => 'done',
    );

    ob_start(); ?>
    <div>
        <h3><?= $ticket->name ?></h3>
        <p><?= $ticket->description ?></p>
        <div>
            <?php if (in_array('edit', $allowedActions)) : ?>
                <a href="edit-ticket?id=<?= $ticket->id ?>">edit</a>
            <?php endif ?>
            <?php if (in_array('delete', $allowedActions)) : ?>
                <a href="delete-ticket?id=<?= $ticket->id ?>">delete</a>
            <?php endif ?>
            <?php if (in_array('approve', $allowedActions)) : ?>
                <a href="approve-ticket?id=<?= $ticket->id ?>">approve</a>
            <?php endif; ?>
            <?php if (in_array('move', $allowedActions)) : ?>
                <?php foreach ($moveActions as $status) : ?>
                    <a href="update-status?id=&status=<?= $status ?>">move to <?= $actionStrings[$status] ?></a>
                <?php endforeach ?>
            <?php endif; ?>
        </div>
    </div>
    <?php return ob_get_clean();
}

