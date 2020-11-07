<?php

require_once 'controllers/User.php';

class View {
    protected $user;

    public function __construct() {
        $this->user = new User();
    }

    protected function loadView($path, $data = []) {
        $output = NULL;
        $filePath = "views/{$path}.php";
        if (file_exists($filePath)) {
            extract($data);
            ob_start();
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        }
        return $output;
    }
}