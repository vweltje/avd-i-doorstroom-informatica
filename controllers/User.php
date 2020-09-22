<?php

class User {
    private $user = false;
    public $pageTitle = 'User';

    public function __construct() {
        $this->setUser();
    }

    private function setUser() {
        $user = $_SESSION['user'] ?? false;
        if ($user) {
            $this->user = $user;
        }
    }

    public function login($username, $password) {
        if ($username === 'test' && $password === 'test') {
            $this->user = true;
            $_SESSION['user'] = $this->user;
        } else {
            return [
                'error' => 'Your login credentials didn\'t match any of our users, please try again.'
            ];
        }
    }
    
    public static function logout() {
        $_SESSION['user'] = false;
        header('Location: /');
    }

    public function loggedIn() {
        return (bool) $this->user;
    }

    public function getBody() {
        return '';
    }
}
