<div class="box-container"> 
    <div class="box">
        <h1>404</h1>
        <p>Oh snap - we couldn't find what you where looking for.</p>
        <a class="button" href="/"><?= $this->user->loggedIn() ? 'return to dashboard' : 'login here' ?></a>
    </div>
</div>
