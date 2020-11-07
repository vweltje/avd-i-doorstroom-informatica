<?php

require_once 'iView.php';
require_once 'User.php';
require_once 'Tickets.php';

class Dashboard implements iView {
    private $tickets;
    public $pageTitle = 'Dashboard';

    public function __construct() {
        global $user;
        if (!$user->loggedIn()) {
            header('Location: /login');
        }
        $ticketController = new tickets();
        $this->tickets = $ticketController->getAllTickets();
    }

    public function getBody() {
        require_once 'views/pages/dashboard.php';
        return dashboardView([
            "tickets" => $this->tickets
        ]);
    }
}
