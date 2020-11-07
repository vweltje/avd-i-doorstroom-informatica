<?php

function pageHeading($heading, $user = false) {
    global $user;
    ob_start(); ?>
    <header id="pageHeading" class="flex-row">
        <h1><?= $heading ?></h1>
        <?php if ($user) : ?>
            <div id="pageHeading--userActions"class="flex-row">   
                <p>Welcome: <?= $user->getName(); ?></p>
                <a href="/logout" class="button">Logout</a>
            </div>
        <?php endif; ?>
    </header>
    <?php return ob_get_clean();
}
