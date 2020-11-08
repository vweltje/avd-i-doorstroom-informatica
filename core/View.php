<?php

require_once 'controllers/User.php';

class View {
    protected $user;
    private $shouldRenderLayout;
    protected $pageTitle;

    public function __construct() {
        $this->user = new User();
        $this->shouldRenderLayout = true;
    }

    protected function loadView($path, $data = []) {
        $output = NULL;
        if ($this->shouldRenderLayout) {
            $data = ['view' => $path, 'data' => $data, 'pageTitle' => $this->pageTitle];
            $path = 'layout';
            $this->shouldRenderLayout = false;
        }
        $viewPath = "views/{$path}.php";
        if (file_exists($viewPath)) {
            extract($data);
            ob_start();
            include $viewPath;
            $output = ob_get_clean();
        } else {
            throw new Exception("Unable to locate component \"{$viewPath}\"");
        }
        return $output;
    }
}