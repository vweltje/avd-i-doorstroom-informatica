<?php

require_once 'core/Model.php';

class TicketModel extends Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function delete($id) {
        $result = $this->db->table('tickets')->where(['id' => $id])->delete();
        header('Location: /');
    }

    public function update($id, $data) {
        $result = $this->db->table('tickets')->where(['id' => $id])->update($data);
        header('Location: /');
    }

    public function add($data) {
        $result = $this->db->table('tickets')->insert($data);
        if (is_numeric($result)) {
            header('Location: /');
        }
        $this->errorMessage = "Something went wrong, please try again.";
    }

    public function get($id) {
        return $this->db->select('*')->from('tickets')->where(['id' => $id])->get();
    }

    public function getAll() {
        $tickets = $this->db->select('*')->from('tickets')->getAll();
        return count($tickets) > 0 ? $this->groupByStatus($tickets) : false;
    }

    private function groupByStatus($tickets) {
        $manipulatedTickets = [];
        foreach ($tickets as $ticket) {
            $status = $ticket->status;
            $manipulatedTickets[$status][] = $ticket;
        }
        return $manipulatedTickets;
    }
}