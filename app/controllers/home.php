<?php

/**
 * Home DEFAULT CONTROLLER
 */
class Home extends Controller
{



  function index($name = '')
  {


    $this->view('home/index',['name'=>$name]);


  }
  function create()
  {


  }


}


 ?>
