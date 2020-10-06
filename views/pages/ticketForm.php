<?php

require_once 'views/components/pageHeading.php';
require_once 'views/components/message.php';
require_once 'helpers/FormHelper.php';

function ticketFormView($errorMessage = '', $ticket) {
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
                            <input type="text" name="name" placeholder="name"  value="<?= FormHelper::getFieldValue('name', $ticket['name'] ?? false) ?>" />
                            <textarea name="description" placeholder="description"><?= FormHelper::getFieldValue('description', $ticket['description'] ?? false) ?></textarea>
                            <button type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php return ob_get_clean();
}
