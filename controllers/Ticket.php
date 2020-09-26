<?php

require_once 'iView.php';

class Ticket implements iView {
    public $pageTitle = 'Ticket';

    public function __construct() {
    }

    public function getBody() {
        require_once 'views/pages/ticketForm.php';
        return ticketFormView();
    }
}