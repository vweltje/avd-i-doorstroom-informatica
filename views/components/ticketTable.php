<div id="ticket-table">
    <?= $this->loadView('components/ticketList', ['tickets' => $tickets['NEW'] ?? false, 'listTitle' => 'Pending approval', 'additionalView' => 'components/addNewTicketButton']) ?>
    <?= $this->loadView('components/ticketList', ['tickets' => $tickets['APPROVED'] ?? false, 'listTitle' => 'Todo']) ?>
    <?= $this->loadView('components/ticketList', ['tickets' => $tickets['IN_PROGRESS'] ?? false, 'listTitle' => 'In progress']) ?>
    <?= $this->loadView('components/ticketList', ['tickets' => $tickets['DONE'] ?? false, 'listTitle' => 'Done']) ?>
</div>