<?php

require_once 'controllers/User.php';
require_once 'views/components/pageHeading.php';

function dashboardView($data) {
    ob_start(); ?>
        <div id="dashboard" class="container"> 
            <?= pageHeading('Dashboard') ?>
            <?php if ($data['user']->inGroup('client')) : ?>
                <a href="/new-ticket">New ticket</a>
            <?php endif; ?>
            <div id="ticket-table" class="flex-row">
                <div class="flex-column">
                    <h2>Pending approval</h2>
                    <div class="flex-column ticket-column">
                        <?php foreach ($data['tickets']['NEW'] as $ticket) : ?>
                            <div>
                                <h3><?= $ticket->name ?></h3>
                                <p><?= $ticket->description ?></p>
                                <?php if ($data['user']->inGroup('client') || $data['user']->inGroup('manager')) : ?>
                                    <div>
                                        <a href="edit-ticket?id=<?= $ticket->id ?>">edit</a>
                                        <a href="delete-ticket?id=<?= $ticket->id ?>">delete</a>
                                        <?php if ($data['user']->inGroup('manager')) : ?>
                                            <a href="approve-ticket?id=<?= $ticket->id ?>">approve</a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="flex-column ticket-column">
                    <h2>Todo</h2>
                </div>
                <div class="flex-column ticket-column">
                    <h2>In progress</h2>
                </div>
                <div class="flex-column ticket-column">
                    <h2>Done</h2>
                </div>
            </div>
        </div>
    <?php return ob_get_clean();
}
