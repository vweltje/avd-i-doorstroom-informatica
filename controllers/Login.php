<?php

require_once 'iView.php';
require_once 'User.php';
require_once 'helpers/FormHelper.php';

class Login implements iView {
    public $pageTitle = 'Login';
    private $errorMessage = '';

    public function __construct() {
        global $user;
        if (FormHelper::isPost()) {
            $this->handleLogin();
        }
        if ($user->loggedIn()) {
            header('Location: /');
        }
    }

    private function handleLogin() {
        $email = FormHelper::getField('email');
        $password = FormHelper::getField('password');
        if ($this->validateInput($email, $password)) {
            global $user;
            $response = $user->login($email, $password);
            if (isset($response['error'])) {
                $this->errorMessage = $response['error'];
            }
        }
    }

    private function validateInput($email, $password) {
        if (!$email && !$password) {
            $this->errorMessage = 'Please enter your email and password.';
        } elseif (!$email) {
            $this->errorMessage = 'Please enter your email.';
        } elseif (!$password) {
            $this->errorMessage = 'Please enter your password.';
        } else {
            return true;
        }
        return false;
    }

    public function getBody() {
        require_once 'views/pages/login.php';
        return loginView($this->errorMessage);
    }
}
