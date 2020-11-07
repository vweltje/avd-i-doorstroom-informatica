<?php

require_once 'controllers/User.php';
require_once 'views/components/pageHeading.php';
require_once 'views/components/ticketList.php';

function dashboardView($data) {
    global $user;
    ob_start(); ?>
        <div id="dashboard" class="container"> 
            <?= pageHeading('Dashboard') ?>
            <?php if ($user->inGroup('client')) : ?>
                <a href="/new-ticket">New ticket</a>
            <?php endif; ?>
            <div id="ticket-table" class="flex-row">
                <?= ticketList($data['tickets']['NEW'], 'Pending approval') ?>
                <?= ticketList($data['tickets']['APPROVED'], 'Todo') ?>
                <?= ticketList($data['tickets']['IN_PROGRESS'], 'In progress') ?>
                <?= ticketList($data['tickets']['DONE'], 'Done') ?>
            </div>
        </div>
    <?php return ob_get_clean();
}
