<?php

/**
 * Home DEFAULT CONTROLLER
 */
class Pages extends Controller
{



  function home($name = '')
  {

     $this->view('pages/home',$data = ['name'=>$name]);


  }
  function contact()
  {

     $this->view('pages/contact',[ 'name'=> "ss" ]);

  }


}


 ?>
