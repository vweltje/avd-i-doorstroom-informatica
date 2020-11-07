<?php

require_once 'ticket.php';

function ticketList($tickets, $listTitle) {
    global $user;
    ob_start(); ?>
    <div class="flex-column">
        <h2><?= $listTitle ?></h2>
        <div class="flex-column ticket-column">
            <?php foreach ($tickets as $ticket) : ?>
                <?= ticket($ticket) ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php return ob_get_clean();
}