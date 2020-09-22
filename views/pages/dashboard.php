<?php

require_once 'views/components/container.php';

function dashboardView ($test) {
    ob_start(); ?>
        <h1>Dashboard</h1>
    <?php return wrapContainer(ob_get_clean());
}