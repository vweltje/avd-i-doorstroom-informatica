<?php

require_once 'core/Router.php';

class View {
    private $siteTitle = 'Ticketify';
    private $view;

    public function __construct() {
        $this->view = Router::getView();
    }

    public function getPageTitle() {
        return "{$this->view->pageTitle} | {$this->siteTitle}";
    }

    public function getBody() {
        return $this->view->getBody();
    }
}
