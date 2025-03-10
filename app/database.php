<?php

declare(strict_types=1);

use Cake\Datasource\ConnectionManager;

ConnectionManager::setConfig('default', [
    'className' => 'Cake\Database\Connection',
    'driver' => 'Cake\Database\Driver\Mysql',
    'database' => $_ENV['DB_DATABASE'] ?? 'social',
    'username' => $_ENV['DB_USERNAME'] ?? 'root',
    'password' => $_ENV['DB_PASSWORD'] ?? 'root',
    'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'timezone' => 'UTC',
]);
