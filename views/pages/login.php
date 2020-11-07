<div class="container"> 
    <div id="login" class="flex-column">
        <h1>Login</h1>
        <p>Login to continue to the dashboard</p>
        <?php if (!empty($errorMessage)) : ?>
            <?= $this->loadView('components/message', [
                'type' => 'error',
                'errorMessage' => $errorMessage
            ]) ?>
        <?php endif; ?>
        <form action="/login" method="post">
            <div class="flex-column">
                <input type="text" placeholder="Enter your email" name="email" value="<?= FormHelper::getField('email') ?>" />
                <input type="password" placeholder="Enter your password" name="password" value="<?= FormHelper::getField('password') ?>" />
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</div>
