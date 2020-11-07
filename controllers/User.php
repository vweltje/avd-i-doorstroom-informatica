<?php

require_once 'models/UserModel.php';

class User {
    private $user = false;
    private $model;

    public function __construct() {
        $this->user = $this->getUser();
        $this->model = new UserModel();
    }

    public function login($email, $password) {
        $user = $this->model->getByEmail($email);
        // echo password_hash($password, PASSWORD_DEFAULT);
        // exit;
        if (is_array($user)) {
            if (password_verify($password, $user['password'])) {
                $this->user = $user;
                $_SESSION['user'] = $this->user;
                header('Location: /');
            } else {
                $errorMessage = 'It looks like your username and password didn\'t match.';
            }
        } else {
            $errorMessage = 'Your login credentials didn\'t match any of our users, please try again.';
        }
        return ['error' => $errorMessage];
    }

    private function getUser() {
        return $_SESSION['user'] ?? false;
    }

    public static function logout() {
        unset($_SESSION['user']);
        header('Location: /');
    }

    public function loggedIn() {
        return (bool) $this->user;
    }

    public function getName() {
        return $this->user['name'] ?? '';
    }

    public function inGroup($group) {
        return $group ? in_array($group, $this->model->getRegisteredGroups($this->user['id'])) : false;
    }
}
