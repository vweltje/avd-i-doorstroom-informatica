<?php

require_once 'iView.php';
require_once 'helpers/FormHelper.php';

class Tickets implements iView {
    public $pageTitle = 'Ticket form';
    private $errorMessage = '';
    private $currentTicketId;

    public function __construct($id = false, $action = false) {
        $this->currentTicketId = $id;

        if ($action === 'delete') {
            $this->deleteTicket($id);
        } elseif ($action === 'update-status') {
            $this->updateStatus($id);
        } elseif (FormHelper::isPost()) {
            $this->adOrEditTicket($id);
        }
    }

    private function updateStatus($id) {
        $status = FormHelper::getField('status', 'GET');
        if (!empty($status) && $this->validateStatus($status)) {
            return $this->updateTicket($id, ['status' => $status]);
        }
    }

    private function adOrEditTicket($id) {
        $data = [
            'name' => FormHelper::getField('name'), 
            'description' => FormHelper::getField('description')
        ];
        if ($this->validateInput($data)) {
            if (!$id) {
                return $this->createNewTicket($data);
            } 
            return $this->updateTicket($id, $data);
        }
    }

    private function validateInput($data) {
        if (!$data['name'] && !$data['description']) {
            $this->errorMessage = 'Please enter a name and description.';
        } elseif (!$data['name']) {
            $this->errorMessage = 'Please enter a name.';
        } elseif (!$data['description']) {
            $this->errorMessage = 'Please enter a description.';
        } else {
            return true;
        }
        return false;
    }

    private function validateStatus($status) {
        $allowedStatusTypes = ['NEW', 'APPROVED', 'IN_PROGRESS', 'DONE'];
        if (!in_array($status, $allowedStatusTypes)) {
            $this->errorMessage = 'The status type you have submitted is not allowed.';
        }
        return true;
    }

    private function createNewTicket($data) {
        $db = new Database();
        $result = $db->table('tickets')->insert($data);
        if (is_numeric($result)) {
            header('Location: /');
        }
        $this->errorMessage = "Something went wrong, please try again.";
    }

    private function updateTicket($id, $data) {
        $db = new Database();
        $result = $db->table('tickets')->where(['id' => $id])->update($data);
        header('Location: /');
    }

    private function deleteTicket($id) {
        $db = new Database();
        $result = $db->table('tickets')->where(['id' => $id])->delete();
        header('Location: /');
    }

    public function getAllTickets() {
        $db = new Database();
        $tickets = $db->select('*')->from('tickets')->getAll();
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

    private function getCurrentTicket() {
        if ($this->currentTicketId) {
            $db = new Database();
            $ticket = $db->select('*')->from('tickets')->where(['id' => $this->currentTicketId])->get();
            return $ticket ?? [];
        }
    }

    public function getBody() {
        require_once 'views/pages/ticketForm.php';
        return ticketFormView($this->errorMessage, $this->getCurrentTicket());
    }
}