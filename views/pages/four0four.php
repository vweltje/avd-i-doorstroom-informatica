<div class="container"> 
    <div class="flex-column">
        <h1>404</h1>
        <p>Oh snap - we couldn't find what you where looking for.</p>
        <a href="/"><?= $this->user->loggedIn() ? 'return to dashboard' : 'login here' ?></a>
    </div>
</div>
