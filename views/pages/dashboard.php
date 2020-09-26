<?php

require_once 'views/components/container.php';
require_once 'views/components/pageHeading.php';

function dashboardView($user) {
    ob_start(); ?>
        <?= pageHeading('Dashboard', $user) ?>
        <?php if ($user->inGroup('client')) : ?>
            <a href="/new-ticket">New ticket</a>
        <?php endif; ?>
    <?php return container(ob_get_clean());
}
