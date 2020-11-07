<?php

require_once 'controllers/Dashboard.php';
require_once 'controllers/Login.php';
require_once 'controllers/User.php';
require_once 'controllers/Tickets.php';
require_once 'controllers/Four0four.php';

class Router {
    public static function getView() {
        $route = self::getRoute();
        if ($route === "/") {
            return new Dashboard();
        } elseif ($route === "/login") {
            return new Login();
        } elseif ($route === '/logout') {
            return User::logout();
        } elseif ($route === '/new-ticket') {
            return new Tickets();
        } elseif ($route === '/delete-ticket') {
            return new Tickets($_GET['id'], 'delete');
        } elseif ($route === '/edit-ticket') {
            return new Tickets($_GET['id'] ?? false, 'edit');
        } elseif ($route === '/update-ticket-status') {
            return new Tickets($_GET['id'] ?? false, 'update-status');
        }
        return new Four0four();
    }

    private static function getRoute() {
        $route = strtok($_SERVER['REQUEST_URI'], '?'); // remove query string from url
        return $route;
    }
}
