<?php
  // App Core
  // Creates URL & loads core controller
  // URL format /controller/method/params
  class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      // print_r($this->getUrl());
      $url = $this->getUrl();
      
      // Check if $url is an array and has at least one element
      if ($url && file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 index
        unset($url[0]);
      }

      // Require the controller
      require_once '../app/controllers/'.$this->currentController.'.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // Check for second part of url
      if (isset($url[1])) {
        // Check to see if method exists in controller
        if (method_exists($this->currentController, $url[1])) {
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }
     // Get params 
     $this->params = $url ? array_values($url) : [];
     //Cal a callback with array of params
     call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
     
     
    }

    public function getUrl(){
      if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
      return [];
    }
  }
?>