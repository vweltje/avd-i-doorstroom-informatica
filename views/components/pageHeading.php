<header id="page-heading">
    <div class="container">
        <div id="page-heading--inner">
            <h1><?= $heading ?></h1>
            <?php if ($this->user) : ?>
                <div id="page-heading-account">   
                    <p>Welcome: <?= $this->user->getName(); ?></p>
                    <a href="/logout">Logout</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
