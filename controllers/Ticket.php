<?php

require_once 'iView.php';
require_once 'helpers/FormHelper.php';

class Ticket implements iView {
    public $pageTitle = 'Ticket form';
    private $errorMessage = '';

    public function __construct($id = false) {
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
            if (!$id) {
                return $this->createNewTicket($name, $description);
            }
        }
    }

    private function createNewTicket($name, $description) {
        $db = new Database();
        $result = $db->table('tickets')->insert([
            'name' => $name,
            'description' => $description
        ]);
        if (is_numeric($response)) {
            header('Location: /');
        }
        $this->errorMessage = "Something went wrong, please try again.";
    }

    public function getBody() {
        require_once 'views/pages/ticketForm.php';
        return ticketFormView($this->errorMessage);
    }
}