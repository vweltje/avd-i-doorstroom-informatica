<?php 

require_once 'User.php';

class Login {

    private $user;

    public $pageTitle = 'Login';

    public function __construct() {
        $this->user = new User();
        if ($this->user->loggedIn()) {
            header('Location: /');
        }
    }

    public function getBody() {
        require_once 'views/login.php';
        return loginView('met een test variable');
    }
}