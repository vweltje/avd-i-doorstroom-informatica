<?php

require_once 'iView.php';
require_once 'helpers/FormHelper.php';
require_once 'models/TicketModel.php';

class Ticket implements iView {
    public $pageTitle = 'Ticket form';
    private $errorMessage = '';
    private $id;
    private $model;

    public function __construct($action = false) {
        $this->id = $_GET['id'] ?? false;
        $this->model = new TicketModel();

        if ($action === 'delete') {
            $this->model->delete($id);
        } elseif ($action === 'update-status') {
            $this->updateStatus($id);
        } elseif (FormHelper::isPost()) {
            $this->addOrEdit($id);
        }
    }

    private function updateStatus($id) {
        $status = FormHelper::getField('status', 'GET');
        if (!empty($status) && $this->validateStatus($status)) {
            return $this->model->update($id, ['status' => $status]);
        }
    }

    private function addOrEdit($id) {
        $data = [
            'name' => FormHelper::getField('name'), 
            'description' => FormHelper::getField('description')
        ];
        if ($this->validateInput($data)) {
            if (!$id) {
                return $this->model->add($data);
            } 
            return $this->model->update($id, $data);
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

    private function getData() {
        $ticket = [];
        if ($this->id) {
            $ticket = $this->model->get($this->id);
        }
        return $ticket;
    }

    public function getBody() {
        require_once 'views/pages/ticketForm.php';
        return ticketFormView($this->errorMessage, $this->getData());
    }
}