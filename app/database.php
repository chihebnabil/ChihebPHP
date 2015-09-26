<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;




 //Config

  $capsule->addConnection([
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'social',
      'username'  => 'root',
      'password'  => 'root',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
  ]);
  // Setup the Eloquent ORM
  $capsule->bootEloquent();


  
 ?>
