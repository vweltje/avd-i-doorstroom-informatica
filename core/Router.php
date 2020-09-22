<?php

require_once 'controllers/Dashboard.php';
require_once 'controllers/Login.php';
require_once 'controllers/User.php';

class Router {
    public static function getView() {
        $route = self::getRoute();
        $view;
        if ($route === "/login") {
            $view = new Login();
        } elseif ($route === '/logout') {
            User::logout();
        } else {
            $view = new Dashboard();
        }
        return $view;
    }

    private static function getRoute() {
        $route = strtok($_SERVER['REQUEST_URI'], '?'); // remove query string from url
        return $route;
    }
}
