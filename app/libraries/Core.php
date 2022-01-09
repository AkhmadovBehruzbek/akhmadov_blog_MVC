<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Core App Class
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->getUrl();
        if (($url !== null) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // Will set new controller
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        // Require the controller
        require '../app/controllers/' .$this->currentController. '.php';
        $this->currentController = new $this->currentController;

        // Check for second part of the URL
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get parameters
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            // Allows you to filter variables as string/number
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Breaking it into an array
            return explode('/', $url);
        }
    }
}