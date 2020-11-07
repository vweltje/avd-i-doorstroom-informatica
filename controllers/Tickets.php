<?php

require_once 'iView.php';
require_once 'helpers/FormHelper.php';

class Tickets implements iView {
    public $pageTitle = 'Ticket form';
    private $errorMessage = '';
    private $currentTicketId;

    public function __construct($id = false) {
        $this->currentTicketId = $id;
        if (FormHelper::isPost()) {
            $this->handleFormInput($id);
        }
    }

    private function handleFormInput($id) {
        $data = [
            'name' => FormHelper::getField('name'), 
            'description' => FormHelper::getField('description')
        ];
        if ($this->validateInput($data)) {
            return $id ? $this->updateTicket($id, $data) : $this->createNewTicket($data);
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

    private function createNewTicket($data) {
        $db = new Database();
        $result = $db->table('tickets')->insert($data);
        if (is_numeric($response)) {
            header('Location: /');
        }
        $this->errorMessage = "Something went wrong, please try again.";
    }

    private function updateTicket($id, $data) {
        $db = new Database();
        $result = $db->table('tickets')->where(['id' => $id])->update($data);
        if ($result) {
            header('Location: /');
        }
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
            unset($ticket->status);
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