<?php

function ticket($ticket) {
    global $user;

    $allowedActions = [];
    $moveActions = [];
    $actionStrings = array(
        'NEW' => 'pending approval',
        'APPROVED' => 'todo',
        'IN_PROGRESS' => 'in progress',
        'DONE' => 'done',
    );

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
            $allowedActions[] = 'move';
            $moveActions[] = 'NEW';
        } elseif ($user->inGroup('employee')) {
            $allowedActions[] = 'move';
            $moveActions[] = 'IN_PROGRESS';
        }
    } elseif ($ticket->status === 'IN_PROGRESS') {
        if ($user->inGroup('employee')) {
            $allowedActions[] = 'move';
            $moveActions[] = 'APPROVED';
            $moveActions[] = 'DONE';
        }
    } else {
        if ($user->inGroup('manager') || $user->inGroup('employee')) {
            $allowedActions[] = 'delete';
            $allowedActions[] = 'move';
            $moveActions[] = 'APPROVED';
        }
        if ($user->inGroup('employee')) {
            $moveActions[] = 'IN_PROGRESS';
        }
    }

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
                <a href="update-ticket-status?id=<?= $ticket->id ?>&status=APPROVED">approve</a>
            <?php endif; ?>
            <?php if (in_array('move', $allowedActions)) : ?>
                <?php foreach ($moveActions as $status) : ?>
                    <a href="update-ticket-status?id=<?= $ticket->id ?>&status=<?= $status ?>">move to <?= $actionStrings[$status] ?></a>
                <?php endforeach ?>
            <?php endif; ?>
        </div>
    </div>
    <?php return ob_get_clean();
}

