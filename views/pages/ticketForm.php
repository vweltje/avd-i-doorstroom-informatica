<?php

require_once 'views/components/container.php';
require_once 'views/components/pageHeading.php';

function ticketFormView() {
    ob_start(); ?>
        <?= pageHeading('New ticket') ?>
        <a href="/">Dashboard</a>
    <?php return container(ob_get_clean());
}
