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
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    private function handleLogin() {
        $email = FormHelper::getField('email');
        $password = FormHelper::getField('password');
        if (!$email && !$password) {
            $this->errorMessage = 'Please enter your email and password.';
        } elseif (!$email) {
            $this->errorMessage = 'Please enter your email.';
        } elseif (!$password) {
            $this->errorMessage = 'Please enter your password.';
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $response = $this->user->login($email, $password);
            if (isset($response['error'])) {
                $this->errorMessage = $response['error'];
            }
        }
    }

    public function getBody() {
        require_once 'views/pages/login.php';
        return loginView($this->errorMessage);
    }
}
