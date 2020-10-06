<?php

function four0fourView($loggedIn) {
    ob_start(); ?>
    <div class="container"> 
        <div class="flex-column">
            <h1>404</h1>
            <p>Oh snap - we couldn't find what you where looking for.</p>
            <a href="/"><?= $loggedIn ? 'return to dashboard' : 'login here' ?></a>
        </div>
    </div>
    <?php return ob_get_clean();
}
