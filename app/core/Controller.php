<?php

/**
 *
 */
class Controller
{

  public function model($model)
  {
    require_once "../app/models/".$model.".php";
    return new $model();
  }

  public function view($view,$data = [],$template="default")
  {



    $content =  file_get_contents("../app/views/".$view.".php");

    require_once "../app/views/layouts/".$template.".php";



  }


}
