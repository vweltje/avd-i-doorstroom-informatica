<?php

require_once 'controllers/Dashboard.php';
require_once 'controllers/Login.php';
require_once 'controllers/User.php';

class Router {
    public static function getView() {
        $route = Router::getRoute();
        $view;
        if ($route === "/login") { 
            $view = new Login();
        } else if ($route === '/logout') {
            User::logout();
        } else {
            $view = new Dashboard();
        }
        return $view;
    }

    private static function getRoute() {
        $route = strtok($_SERVER['REQUEST_URI'],'?'); // remove query string from url
        return $route;
    }
}