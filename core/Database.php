<?php

class Database {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbName = 'avd-i-doorstroom';
    public $db = null;

    private $where = [];
    private $table = '';

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host={$this->hostname};dbname={$this->dbName}", $this->username, $this->password);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function __destruct() {
        $this->db = null;
    }

    public function where($arguments = []) {
        $where = '';
        if (count($arguments)) {
            foreach ($arguments as $argument => $value) {
                if (!empty($where)) {
                    $where .= ' AND ';
                }
                $where .= "`{$argument}` = '{$value}'";
            }
        }
        $this->where = $where;
        return $this;
    }

    public function from($table) {
        if (!empty($table)) {
            $this->table = $table;
        }
        return $this;
    }

    public function get($fields = '') {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        $query = "SELECT {$fields} FROM `{$this->table}`";
        if ($this->where) {
            $query .= " WHERE {$this->where}";
        }
        $query .= ';';
        return $this->_fetch($query);
    }

    private function _fetch($query) {
        try {
            $st = $this->db->prepare($query);
            $st->execute();
            return $st->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
