<?php

require_once 'views/components/pageHeading.php';

function ticketFormView() {
    ob_start(); ?>
        <div class="container"> 
            <?= pageHeading('New ticket') ?>
            <a href="/">Dashboard</a>
            <div>
                <form action="">
                    <input type="text" name="name" placeholder="name" />
                    <textarea name="description" placeholder="description"></textarea>
                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    <?php return ob_get_clean();
}
