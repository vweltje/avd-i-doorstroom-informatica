<div id="dashboard" class="container"> 
    <?= $this->loadView('components/pageHeading', ['heading' => 'Dashboard']); ?>
    <?php if ($this->user->inGroup('client')) : ?>
        <a href="/new-ticket">New ticket</a>
    <?php endif; ?>
    <div id="ticket-table" class="flex-row">
        <?= $this->loadView('components/ticketList', ['tickets' => $tickets['NEW'] ?? false, 'listTitle' => 'Pending approval']) ?>
        <?= $this->loadView('components/ticketList', ['tickets' => $tickets['APPROVED'] ?? false, 'listTitle' => 'Todo']) ?>
        <?= $this->loadView('components/ticketList', ['tickets' => $tickets['IN_PROGRESS'] ?? false, 'listTitle' => 'In progress']) ?>
        <?= $this->loadView('components/ticketList', ['tickets' => $tickets['DONE'] ?? false, 'listTitle' => 'Done']) ?>
    </div>
</div>
