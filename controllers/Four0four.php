<?php

require_once 'iView.php';

class Four0four implements iView {
    public $pageTitle = '404 Page not found';

    public function getBody() {
        require_once 'views/pages/four0four.php';
        return four0fourView();
    }
}
