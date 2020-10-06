<?php

require_once 'views/components/pageHeading.php';

function ticketFormView($errorMessage = '') {
    ob_start(); ?>
        <div class="container"> 
            <div>
                <?= pageHeading('New ticket') ?>
                <a href="/">Dashboard</a>
                <div>
                <?php if (!empty($errorMessage)) : ?>
                    <?= message('error', $errorMessage); ?>
                <?php endif; ?>
                    <form action="" method="post">
                        <div class="flex-column">
                            <input type="text" name="name" placeholder="name"  value="<?= FormHelper::getField('name') ?>" />
                            <textarea name="description" placeholder="description"><?= FormHelper::getField('description') ?></textarea>
                            <button type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php return ob_get_clean();
}
