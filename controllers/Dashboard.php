<?php

require_once 'iView.php';
require_once 'User.php';
require_once 'Tickets.php';

class Dashboard implements iView {
    private $user;
    private $tickets;
    public $pageTitle = 'Dashboard';

    public function __construct() {
        $ticketController = new tickets();
        $this->user = new User();
        $this->tickets = $ticketController->getAllTickets();
        if (!$this->user->loggedIn()) {
            header('Location: /login');
        }
    }

    public function getBody() {
        require_once 'views/pages/dashboard.php';
        return dashboardView([
            "user" => $this->user,
            "tickets" => $this->tickets
        ]);
    }
}
