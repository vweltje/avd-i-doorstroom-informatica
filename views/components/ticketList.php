<div class="ticket-list">
    <h2><?= $listTitle ?></h2>
    <?= isset($additionalView) ? $this->loadView($additionalView) : '' ?>
    <ul>
        <?php if ($tickets) :
            foreach ($tickets as $ticket) : ?>
                <?= $this->loadView('components/ticket', ['ticket' => $ticket]) ?>
            <?php endforeach;
        endif ?>
    </ul>
</div>