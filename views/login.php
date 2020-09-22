<?php

function loginView ($test) {
    ob_start(); ?>
        <h1>Login</h1>
        <p><?= $test ?></p>
    <?php return ob_get_clean();
}