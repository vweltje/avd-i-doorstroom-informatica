<?php

require_once 'controllers/User.php';
require_once 'views/components/container.php';
require_once 'views/components/pageHeading.php';

function dashboardView() {
    $user = new User();
    ob_start(); ?>
        <?= pageHeading('Dashboard') ?>
        <?php if ($user->inGroup('client')) : ?>
            <a href="/new-ticket">New ticket</a>
        <?php endif; ?>
    <?php return container(ob_get_clean());
}
