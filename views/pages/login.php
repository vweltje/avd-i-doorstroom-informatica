<?php

require_once 'views/components/container.php';
require_once 'views/components/message.php';
require_once 'helpers/FormHelper.php';

function loginView($errorMessage = '') {
    ob_start(); ?>
        <h1>Login</h1>
        <p>Login to continue to the dashboard</p>
        <?php if (!empty($errorMessage)) : ?>
            <?= message('error', $errorMessage); ?>
        <?php endif; ?>
        <form action="/login" method="post">
            <input type="text" placeholder="Enter your username" name="username" value="<?= FormHelper::getField('username') ?>" />
            <input type="password" placeholder="Enter your password" name="password" value="<?= FormHelper::getField('password') ?>" />
            <button type="submit">Login</button>
        </form>
    <?php return wrapContainer(ob_get_clean());
}
