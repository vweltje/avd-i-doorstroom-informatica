<?php

require_once 'core/Database.php';

class Model {
    public $db;

    public function __construct() {
        $this->db = new Database();
    }
}