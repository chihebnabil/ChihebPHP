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

    ob_start();
    include "../app/views/".$view.".php";
    $content = ob_get_contents();
    ob_end_clean();


    require_once "../app/views/layouts/".$template.".php";



  }


}
