<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;




 //Config

  $capsule->addConnection([
      'driver'    => 'mysql',
      'host'      => '127.0.0.1',
      'database'  => 'social',
      'username'  => 'root',
      'password'  => 'root',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => ''
  ]);
$capsule->setAsGlobal();
  // Setup the Eloquent ORM
$capsule->bootEloquent();



 ?>
