<?php

require_once 'helpers/FormHelper.php';

?>

<div class="box-container"> 
    <div class="box">
        <h1 class="box-heading">New ticket</h1>
        <?php if (!empty($errorMessage)) : ?>
            <?= $this->loadView('components/message', ['type' => 'error', 'message' => $errorMessage]) ?>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-field">
                <label for="name">Subject</label>
                <input id="name" type="text" name="name" placeholder="Enter a subject"  value="<?= FormHelper::getFieldValue('name', $ticket['name'] ?? false) ?>" />
            </div>
            <div class="form-field">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter the description"><?= FormHelper::getFieldValue('description', $ticket['description'] ?? false) ?></textarea>
            </div>
            <div class="form-buttons">
                <a class="button gray" href="/">Cancel</a>
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
