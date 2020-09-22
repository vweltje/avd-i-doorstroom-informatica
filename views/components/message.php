<?php

function message($type = 'success', $message) {
    ob_start() ?>
    <div class="message <?= $type ?>">
        <p>
            <?= $message ?>
        </p>
    </div>
    <?php return ob_get_clean();
}
