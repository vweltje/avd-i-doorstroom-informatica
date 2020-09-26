<?php

require_once 'controllers/Dashboard.php';
require_once 'controllers/Login.php';
require_once 'controllers/User.php';

class Router {
    public static function getView() {
        $route = self::getRoute();
        if ($route === "/login") {
            return new Login();
        } elseif ($route === '/logout') {
            return User::logout();
        }
        return new Dashboard();
    }

    private static function getRoute() {
        $route = strtok($_SERVER['REQUEST_URI'], '?'); // remove query string from url
        return $route;
    }
}
