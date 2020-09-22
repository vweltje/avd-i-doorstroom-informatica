<?php

require_once './controllers/View.php';

session_start();

$view = new View();

?>

<html lang="en">
    <head>
        <title><?= $view->getPageTitle() ?></title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <?= $view->getBody(); ?>
    </body>
</html>