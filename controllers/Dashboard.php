<?php

require_once 'core/View.php';

class Dashboard extends View {
    private $tickets;
    public $pageTitle = 'Dashboard';

    public function __construct() {
        parent::__construct();
        if (!$this->user->loggedIn()) {
            header('Location: /login');
        }
        $ticketModel = new TicketModel();
        $this->tickets = $ticketModel->getAll();
        echo $this->loadView('pages/dashboard', [
            "tickets" => $this->tickets
        ]);
    }
}
