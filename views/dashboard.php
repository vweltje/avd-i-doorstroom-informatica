<?php

function dashboardView ($test) {
    ob_start(); ?>
        <h1>Dashboard</h1>
        <p><?= $test ?></p>
    <?php return ob_get_clean();
}