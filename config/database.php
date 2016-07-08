<?php

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Using For Database Configuration
 */
define('DB_TYPE', 'mysql');
define('DB_USER', 'root');
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_PASSWORD', '');
define('DB_NAME', 'bank');

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => DB_TYPE,
    'host' => DB_HOST,
    'port' => DB_PORT,
    'database' => DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASSWORD,
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
    'strict' => false,
    'engine' => null,
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
	