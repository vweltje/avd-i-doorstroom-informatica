<?php

function four0fourView() {
    global $user;
    ob_start(); ?>
    <div class="container"> 
        <div class="flex-column">
            <h1>404</h1>
            <p>Oh snap - we couldn't find what you where looking for.</p>
            <a href="/"><?= $user->loggedIn() ? 'return to dashboard' : 'login here' ?></a>
        </div>
    </div>
    <?php return ob_get_clean();
}
