<?php

require_once 'views/components/container.php';
require_once 'views/components/message.php';
require_once 'helpers/FormHelper.php';

function loginView($errorMessage = '') {
    ob_start(); ?>
    <div id="login" class="flex-column">
        <h1>Login</h1>
        <p>Login to continue to the dashboard</p>
        <?php if (!empty($errorMessage)) : ?>
            <?= message('error', $errorMessage); ?>
        <?php endif; ?>
        <form action="/login" method="post">
            <div class="flex-column">
                <input type="text" placeholder="Enter your email" name="email" value="<?= FormHelper::getField('email') ?>" />
                <input type="password" placeholder="Enter your password" name="password" value="<?= FormHelper::getField('password') ?>" />
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    <?php return container(ob_get_clean());
}
