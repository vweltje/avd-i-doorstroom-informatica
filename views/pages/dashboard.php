<?php

require_once 'views/components/container.php';

function dashboardView ($test) {
    ob_start(); ?>
        <h1>Dashboard</h1>
        <form action="/logout" acton="post">
            <button type="submit">Logout</button>
        </form>
    <?php return wrapContainer(ob_get_clean());
}