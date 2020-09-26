<?php

require_once 'core/Database.php';

class User {
    private $user = false;
    public $pageTitle = 'User';

    public function __construct() {
        $this->setUser();
    }

    public function login($email, $password) {
        $db = new Database();
        $user = $db->where(array('email' => $email))->from('users')->get();
        if (is_array($user)) {
            if (password_verify($password, $user['password'])) {
                $this->user = $user;
                $_SESSION['user'] = $this->user;
                return header('Location: /');
            } else {
                $errorMessage = 'Your it looks like your username and password didn\'t match.';
            }
        } else {
            $errorMessage = 'Your login credentials didn\'t match any of our users, please try again.';
        }
        return ['error' => $errorMessage];
    }


    private function setUser() {
        $user = $_SESSION['user'] ?? false;
        if ($user) {
            $this->user = $user;
        }
    }
    
    public static function logout() {
        unset($_SESSION['user']);
        header('Location: /');
    }

    public function loggedIn() {
        return (bool) $this->user;
    }

    public function getBody() {
        return '';
    }
}
