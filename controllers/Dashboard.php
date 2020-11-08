<?php

require_once 'core/View.php';

class Dashboard extends View {
    protected $pageTitle = 'Dashboard';

    public function __construct() {
        parent::__construct();
        if (!$this->user->loggedIn()) {
            header('Location: /login');
        }
        $ticketModel = new TicketModel();
        echo $this->loadView('pages/dashboard', [
            "tickets" => $ticketModel->getAll()
        ]);
    }
}
