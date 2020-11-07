<?php

session_start();
ini_set('display_errors', 1);

require_once 'core/Router.php';
?>

<html lang="en">
    <head>
        <title>Ticketify</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <?php Router::getView() ?>
    </body>
</html>