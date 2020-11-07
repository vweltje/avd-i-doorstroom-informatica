<?php

require_once 'ticket.php';

function ticketList($tickets, $listTitle) {
    global $user;
    ob_start(); ?>
    <div class="flex-column">
        <h2><?= $listTitle ?></h2>
        <div class="flex-column ticket-column">
            <?php if ($tickets) :
                foreach ($tickets as $ticket) : ?>
                    <?= ticket($ticket) ?>
                <?php endforeach;
    endif ?>
        </div>
    </div>
    <?php return ob_get_clean();
}