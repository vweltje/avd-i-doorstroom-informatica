<?php

class Database {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbName = 'avd-i-doorstroom';
    public $db = null;

    private $select = '';
    private $where = '';
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
                if (is_array($value)) { // used for where IN or where NOT IN
                    $whereValue = $this->implodeAndWrap($value, is_string($value) ? "'" : ''); // wrap ech field in `` and add comma between fields
                    $where .= "{$argument} ({$whereValue})";
                } else {
                    $where .= "`{$argument}` = '{$value}'";
                }
            }
        }
        $this->where = $where;
        return $this;
    }

    public function select($fields = []) {
        $this->select = '*'; // default select all
        if (!empty($fields)) {
            $this->select = $this->implodeAndWrap($fields); // wrap ech field in `` and add comma between fields
        }
        return $this;
    } 

    public function from($table) {
        if (!empty($table)) {
            $this->table = "`{$table}`";
        }
        return $this;
    }

    private function getQuery() {
        $additionalWhere = $this->where ? ' WHERE ' . $this->where : '';
        return "SELECT {$this->select} FROM {$this->table}{$additionalWhere};";
    }

    private function executeQuery() {
        $statement = $this->db->prepare($this->getQuery());
        $statement->execute();
        return $statement;
    }

    private function reset() {
        $this->select = '';
        $this->where = '';
        $this->table = '';
    }

    private function implodeAndWrap($array, $wrapper = '`') {
        return "$wrapper" . implode("$wrapper, $wrapper", $array) . "$wrapper";
    }

    public function get() {
        return $this->executeQuery()->fetch();
    }

    public function getAll() {
        $result = $this->executeQuery()->fetchAll(PDO::FETCH_CLASS);
        $resultsClean = $this->clean($result);
        $this->reset();
        return $resultsClean;
    }

    /*
    *   if selected single field we strip out the object keys and return a array with the values only
    */
    private function clean($results) {
        if (!empty($results)) {
            if ($this->select !== '*' && !strpos($this->select, ', ')) { // selected single field
                $cleanResults = [];
                $key = str_replace('`', '', $this->select);
                foreach ($results as $result) {
                    if (is_object($result)) {
                        $cleanResults[] = $result->$key;
                    }
                }
                return $cleanResults;
            }
        }
        return $results;
    }
}
