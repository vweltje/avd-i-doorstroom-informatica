<?php

function container($children) {
    ob_start(); ?>
    <div class="container"> 
        <?= $children ?>
    </div>
    <?php return ob_get_clean();
}
