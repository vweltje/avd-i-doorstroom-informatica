<?php 

require_once 'User.php';
require_once 'views/pages/login.php';
require_once 'helpers/FormHelper.php';

class Login {

    private $user;

    public $pageTitle = 'Login';
    private $errorMessage = '';

    public function __construct() {
        $this->user = new User();
        if ($this->user->loggedIn()) {
            header('Location: /');
        }
    }

    private function isLoginFormSubmit() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    private function handleLogin() {
        $errorMessage = '';
        $username = FormHelper::getField('username');
        $password = FormHelper::getField('password');
        if (!$username && !$password) {
            $errorMessage = 'Please enter your username and password.';
        } else if (!$username) {
            $errorMessage = 'Please enter a username';
        } else if (!$password) {
            $errorMessage = 'Please enter your password';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }
        $this->errorMessage = $errorMessage;
    }

    public function getBody() {
        if ($this->isLoginFormSubmit()) {
            $this->handleLogin();
        }
        return loginView($this->errorMessage);
    }
}