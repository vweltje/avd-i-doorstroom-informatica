<?php
    require_once 'helpers/TicketHelper.php';

    $allowedActions = TicketHelper::getAllowedUserActions($ticket->status, $this->user);
    $moveActions =  TicketHelper::getAllowedMoveActions($ticket->status, $this->user);
    $actionStrings = [
        'NEW' => 'pending approval',
        'APPROVED' => 'todo',
        'IN_PROGRESS' => 'in progress',
        'DONE' => 'done'
    ];
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


