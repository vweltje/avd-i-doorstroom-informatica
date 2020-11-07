<?php

require_once 'core/View.php';
require_once 'helpers/FormHelper.php';

class Login extends View {
    public $pageTitle = 'Login';
    private $errorMessage = '';

    public function __construct() {
        parent::__construct();
        if (FormHelper::isPost()) {
            $this->handleLogin();
        }
        if ($this->user->loggedIn()) {
            header('Location: /');
        }
        echo $this->loadView('pages/login', [
            'errorMessages' => $this->errorMessage
        ]);
    }

    private function handleLogin() {
        $email = FormHelper::getField('email');
        $password = FormHelper::getField('password');
        if ($this->validateInput($email, $password)) {
            $response = $this->user->login($email, $password);
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
}
