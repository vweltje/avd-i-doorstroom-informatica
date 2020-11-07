<?php

require_once 'iView.php';
require_once 'User.php';
require_once 'models/TicketModel.php';

class Dashboard implements iView {
    private $tickets;
    public $pageTitle = 'Dashboard';

    public function __construct() {
        global $user;
        if (!$user->loggedIn()) {
            header('Location: /login');
        }
        $ticketModel = new TicketModel();
        $this->tickets = $ticketModel->getAll();
    }

    public function getBody() {
        require_once 'views/pages/dashboard.php';
        return dashboardView([
            "tickets" => $this->tickets
        ]);
    }
}
