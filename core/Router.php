<?php

require_once 'controllers/Dashboard.php';
require_once 'controllers/Login.php';
require_once 'controllers/Ticket.php';
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
            return new Ticket();
        } elseif ($route === '/delete-ticket') {
            return new Ticket('delete');
        } elseif ($route === '/edit-ticket') {
            return new Ticket('edit');
        } elseif ($route === '/update-ticket-status') {
            return new Ticket('update-status');
        }
        return new Four0four();
    }

    private static function getRoute() {
        $route = strtok($_SERVER['REQUEST_URI'], '?'); // remove query string from url
        return $route;
    }
}
