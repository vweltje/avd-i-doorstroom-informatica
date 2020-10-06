<?php

require_once 'iView.php';

class Four0four implements iView {
    public $pageTitle = '404 Page not found';
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function getBody() {
        require_once 'views/pages/four0four.php';
        return four0fourView($this->user->loggedIn());
    }
}
