<?php

require_once 'iView.php';
require_once 'User.php';

class Dashboard implements iView {
    private $user;

    public $pageTitle = 'Dashboard';

    public function __construct() {
        $this->user = new User();
        if (!$this->user->loggedIn()) {
            header('Location: /login');
        }
    }

    public function getBody() {
        require_once 'views/pages/dashboard.php';
        return dashboardView();
    }
}
