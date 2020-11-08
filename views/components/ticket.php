<?php
    $allowedActions = [];
    $moveActions = [];
    $actionStrings = array(
        'NEW' => 'pending approval',
        'APPROVED' => 'todo',
        'IN_PROGRESS' => 'in progress',
        'DONE' => 'done',
    );

    if ($ticket->status === 'NEW') {
        if (!$this->user->inGroup('employee')) {
            $allowedActions[] = 'edit';
            $allowedActions[] = 'delete';
        }
        if ($this->user->inGroup('manager')) {
            $allowedActions[] = 'approve';
        }
    } elseif ($ticket->status === 'APPROVED') {
        if ($this->user->inGroup('manager')) {
            $allowedActions[] = 'edit';
            $allowedActions[] = 'delete';
            $allowedActions[] = 'move';
            $moveActions[] = 'NEW';
        } elseif ($this->user->inGroup('employee')) {
            $allowedActions[] = 'move';
            $moveActions[] = 'IN_PROGRESS';
        }
    } elseif ($ticket->status === 'IN_PROGRESS') {
        if ($this->user->inGroup('employee')) {
            $allowedActions[] = 'move';
            $moveActions[] = 'APPROVED';
            $moveActions[] = 'DONE';
        }
    } else {
        if ($this->user->inGroup('manager') || $this->user->inGroup('employee')) {
            $allowedActions[] = 'delete';
            $allowedActions[] = 'move';
            $moveActions[] = 'APPROVED';
        }
        if ($this->user->inGroup('employee')) {
            $moveActions[] = 'IN_PROGRESS';
        }
    }
?>

<li class="ticket">
    <h3><?= $ticket->name ?></h3>
    <p><?= $ticket->description ?></p>
    <div class="ticket-actions">
        <?php if (in_array('edit', $allowedActions)) : ?>
            <a class="button small gray" href="edit-ticket?id=<?= $ticket->id ?>">Edit</a>
        <?php endif ?>
        <?php if (in_array('delete', $allowedActions)) : ?>
            <a class="button small gray" href="delete-ticket?id=<?= $ticket->id ?>">Delete</a>
        <?php endif ?>
        <?php if (in_array('approve', $allowedActions)) : ?>
            <a class="button small gray" href="update-ticket-status?id=<?= $ticket->id ?>&status=APPROVED">Approve</a>
        <?php endif; ?>
        <?php if (in_array('move', $allowedActions)) : ?>
            <?php foreach ($moveActions as $status) : ?>
                <a class="button small gray" href="update-ticket-status?id=<?= $ticket->id ?>&status=<?= $status ?>">Move to <?= $actionStrings[$status] ?></a>
            <?php endforeach ?>
        <?php endif; ?>
    </div>
</li>


