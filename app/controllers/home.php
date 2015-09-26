<?php

/**
 * Home DEFAULT CONTROLLER
 */
class Home extends Controller
{

  protected $user;



  function __construct()
  {
  $this->user = $this->model('User');


  }



  function index()
  {
    $user =  $this->user;

    $this->view('home/index');


  }
  function create()
  {
    $user =  $this->user;







  // $this->view('home/index');


  }


}


 ?>
