<?php

require_once 'controllers/User.php';
require_once 'views/components/pageHeading.php';

function dashboardView() {
    $user = new User();
    ob_start(); ?>
        <div class="container"> 
            <?= pageHeading('Dashboard') ?>
            <?php if ($user->inGroup('client')) : ?>
                <a href="/new-ticket">New ticket</a>
            <?php endif; ?>
        </div>
    <?php return ob_get_clean();
}
