<?php

session_start();
ini_set('display_errors', 1);

require_once 'core/Router.php';

Router::getView();
