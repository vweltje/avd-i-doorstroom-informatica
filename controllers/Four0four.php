<?php

require_once 'core/View.php';

class Four0four extends View {
    public $pageTitle = '404 Page not found';

    public function __construct() {
        parent::__construct();
        echo $this->loadView('pages/four0four');
    }
}
