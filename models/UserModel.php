<?php

require_once 'core/Model.php';

class UserModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function getByEmail($email) {
        return $this->db->select('*')->from('users')->where(['email' => $email])->get();
    }

    public function getRegisteredGroups($id) {
        $db = new Database();
        $groupIds = $this->db->select(['group-id'])->from('user-groups')->where(['user-id' => $id])->getAll();
        return $this->db->select(['name'])->from('groups')->where(['id IN' => $groupIds])->getAll();
    }
}