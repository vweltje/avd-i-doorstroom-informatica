<?= $this->loadView('components/pageHeading', ['heading' => 'Dashboard']); ?>

<div id="dashboard" class="container"> 
    <?= $this->loadView('components/ticketTable', ['tickets' => $tickets]) ?>
</div>
