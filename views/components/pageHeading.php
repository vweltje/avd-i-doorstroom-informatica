<?php

require_once 'controllers/User.php';

function pageHeading($heading, $user = false) {
    $user = new User();
    ob_start(); ?>
    <header id="pageHeading" class="flex">
        <h1><?= $heading ?></h1>
        <?php if ($user) : ?>
            <div id="pageHeading--userActions"class="flex">   
                <p>Welcome: <?= $user->getName(); ?></p>
                <a href="/logout" class="button">Logout</a>
            </div>
        <?php endif; ?>
    </header>
    <?php return ob_get_clean();
}
