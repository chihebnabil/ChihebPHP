<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;


define('HOSTNAME','127.0.0.1');
define('DATABASE','social');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');

 //Config

  $capsule->addConnection([
      'driver'    => 'mysql',
      'host'      => DATABASE,
      'database'  => DATABASE,
      'username'  => DB_USERNAME,
      'password'  => DB_PASSWORD,
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => ''
  ]);
$capsule->setAsGlobal();
  // Setup the Eloquent ORM
$capsule->bootEloquent();


$prefix = ['admin'];



 ?>
