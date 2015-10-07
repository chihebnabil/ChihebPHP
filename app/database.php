<?php
define('HOSTNAME','127.0.0.1');
define('DATABASE','social');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');


use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
ConnectionManager::config('default', [
    'className' => 'Cake\Database\Connection',
    'driver' => 'Cake\Database\Driver\Mysql',
    'database' => DATABASE,
    'username' => DB_USERNAME,
    'password' => DB_PASSWORD,
    'host'     => HOSTNAME
]);







 ?>
