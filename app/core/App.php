<?php

class App
{


  protected $controller = "pages";
  protected $method = "home";
  protected $params = [];


  function __construct()
  {
    # code...
    $url =$this->URLparser();

    if (file_exists("../app/controllers/".$url[0].'.php')) {
      $this->controller = $url[0];
      unset($url[0]);
      # code...
    }

    require_once "../app/controllers/".$this->controller.'.php';
    $this->controller = new $this->controller;



    if (isset($url[1])) {
    //  die($url[1]);

      if (method_exists($this->controller,$url[1])) {


        $this->method  = $url[1];
        # code...
        unset($url[1]);
      }

    }

    $this->params = $url ? array_values($url) : [];
    call_user_func_array(  [$this->controller,  $this->method],  $this->params);




  }


 public  function URLparser(){


    if ( isset($_GET['url']) ) {


      return explode("/",filter_var(trim($_GET['url'],'/'),FILTER_SANITIZE_URL)) ;   # code...
    }



}
}
