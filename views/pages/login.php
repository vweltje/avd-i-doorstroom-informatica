<div class="container"> 
    <div id="login">
        <div id="login-box">
            <h1>Login</h1>
            <?php if (!empty($errorMessage)) : ?>
                <?= $this->loadView('components/message', [
                    'type' => 'error',
                    'message' => $errorMessage
                ]) ?>
            <?php endif; ?>
            <form action="/login" method="post">
                <div class="form-field">
                    <label for="email">Email address</label>
                    <input type="text" placeholder="Enter your email" id="email" name="email" value="<?= FormHelper::getField('email') ?>" />
                </div>
                <div class="form-field">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter your password" id="password" name="password" value="<?= FormHelper::getField('password') ?>" />
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
