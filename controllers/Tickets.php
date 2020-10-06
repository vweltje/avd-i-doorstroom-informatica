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
        $name = FormHelper::getField('name');
        $description = FormHelper::getField('description');
        if (!$name && !$description) {
            $this->errorMessage = 'Please enter a name and description.';
        } elseif (!$name) {
            $this->errorMessage = 'Please enter a name.';
        } elseif (!$description) {
            $this->errorMessage = 'Please enter a description.';
        } else {
            $data = ['name' => $name, 'description' => $description];
            if (!$id) {
                return $this->createNewTicket($data);
            } else {
                return $this->updateTicket($id, $data);
            }
        }
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
        if ($tickets) {
            return $this->groupByStatus($tickets);
        }
        return false;
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

    private function currentTicket() {
        if ($this->currentTicketId) {
            $db = new Database();
            $ticket = $db->select('*')->from('tickets')->where(['id' => $this->currentTicketId])->get();
            return $ticket ?? [];
        }
    }

    public function getBody() {
        require_once 'views/pages/ticketForm.php';
        return ticketFormView($this->errorMessage, $this->currentTicket());
    }
}