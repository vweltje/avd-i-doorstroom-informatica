<?php

function pageHeading($heading, $user) {
    ob_start(); ?>
    <header id="pageHeading" class="flex">
        <h1><?= $heading ?></h1>
        <div id="pageHeading--userActions"class="flex">   
            <p>Welcome: <?= $user->getName(); ?></p>
            <form action="/logout" acton="post">
                <button type="submit">Logout</button>
            </form>
        </div>
    </header>
    <?php return ob_get_clean();
}
