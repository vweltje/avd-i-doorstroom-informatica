<?php

session_start();

require_once 'controllers/User.php';
require_once 'controllers/View.php';

global $user;

$user = new User();
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