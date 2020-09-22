<?php

require_once 'User.php';
require_once 'helpers/FormHelper.php';

class Login {
    private $user;

    public $pageTitle = 'Login';
    private $errorMessage = '';

    public function __construct() {
        $this->user = new User();
        if ($this->isLoginFormSubmit()) {
            $this->handleLogin();
        }
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
        } elseif (!$username) {
            $errorMessage = 'Please enter a username';
        } elseif (!$password) {
            $errorMessage = 'Please enter your password';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $response = $this->user->login($username, $password);
            if (isset($response['error'])) {
                $errorMessage = $response['error'];
            }
        }
        $this->errorMessage = $errorMessage;
    }

    public function getBody() {
        require_once 'views/pages/login.php';
        return loginView($this->errorMessage);
    }
}
