<header id="page-heading">
    <div class="container">
        <div id="page-heading-inner">
            <a id="icon" href="/"><?= $heading ?></a>
            <?php if ($this->user->loggedIn()) : ?>
                <?= $this->loadView('components/userBlock') ?>
            <?php endif; ?>
        </div>
    </div>
</header>
