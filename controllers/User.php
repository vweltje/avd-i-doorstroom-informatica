<?php 

class User {

    private $user;
    public $pageTitle = 'User';

    public function __construct() {
        
    }

    public function loggedIn() {
        return false;
    } 

    public function getBody() {
        return '';
    }
}