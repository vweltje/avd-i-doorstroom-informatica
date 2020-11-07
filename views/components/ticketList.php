<div class="flex-column">
    <h2><?= $listTitle ?></h2>
    <div class="flex-column ticket-column">
        <?php if ($tickets) :
            foreach ($tickets as $ticket) : ?>
                <?= $this->loadView('components/ticket', ['ticket' => $ticket]) ?>
            <?php endforeach;
        endif ?>
    </div>
</div>