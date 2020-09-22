<?php

require_once 'Dashboard.php';
require_once 'Login.php';
require_once 'User.php';

global $constants;

class View {

    private $siteTitle = 'Ticketify';
    private $view;

    public function __construct() {
        $this->setView();
    }

    private function setView() {
        $route = $this->getRoute();

        if ($route === "login") { 
            $this->view = new Login();
        } else if ($route === 'logout') {
            User::logout();
        } else {
            $this->view = new Dashboard();
        }
    }

    private function getRoute() {
        $urlParameters = array_values(array_filter(explode("/", strtok($_SERVER['REQUEST_URI'],'?')))); // Convert URI request to array and filter out empty values 
        $route = $urlParameters[0] ?? ''; // get fist string of the array, if not present set to empty string
        return $route;
    }

    public function getPageTitle() {
        return "{$this->view->pageTitle} | {$this->siteTitle}";
    }

    public function getBody() {
        return $this->view->getBody();
    }
}