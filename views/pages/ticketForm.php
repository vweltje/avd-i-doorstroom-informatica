<?php

require_once 'helpers/FormHelper.php';

?>

<div class="container"> 
    <div>
        <?= $this->loadView('components/pageHeading', ['heading' => 'New ticket']) ?>
        <a href="/">Dashboard</a>
        <div>
        <?php if (!empty($errorMessage)) : ?>
            <?= $this->loadView('message', ['type' => 'error', 'message' => $errorMessage]) ?>
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
