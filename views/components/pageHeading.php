<header id="pageHeading" class="flex-row">
    <h1><?= $heading ?></h1>
    <?php if ($this->user) : ?>
        <div id="pageHeading--userActions"class="flex-row">   
            <p>Welcome: <?= $this->user->getName(); ?></p>
            <a href="/logout" class="button">Logout</a>
        </div>
    <?php endif; ?>
</header>
