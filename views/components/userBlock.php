<div id="user-block" class="foldable-list-trigger">   
    <div>
        <span id="name"><?= $this->user->getName(); ?></span>
        <span id="group"><?= $this->user->getGroups(); ?></span>
    </div>
    <div>
        <?= $this->loadView('components/avatar') ?>
    </div>
    <?= $this->loadView('components/foldableList', [
        'links' => [
            ['link' => '/logout', 'label' => 'logout']
        ]
    ]) ?>
</div>