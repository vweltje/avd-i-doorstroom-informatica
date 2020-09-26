<?php

require_once 'core/Database.php';

class User {
    private $user = false;
    public $pageTitle = 'User';

    public function __construct() {
        $this->user = $this->getUser();
    }

    public function login($email, $password) {
        $db = new Database();
        $user = $db->where(['email' => $email])->from('users')->get();
        // echo password_hash($password, PASSWORD_DEFAULT);
        // exit;
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


    private function getUser() {
        return $_SESSION['user'] ?? false;
    }
    
    private function getGroups() {
        $db = new Database();
        $groupIds = $db->select(['group-id'])->from('user-groups')->where(['user-id' => $this->user['id']])->getAll();
        $groups = $db->select(['name'])->from('groups')->where(['id IN' => $groupIds])->getAll();
        return $groups;
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
        if (!$group) {
            return false;
        }
        return in_array($group, $this->getGroups());
    }
}
