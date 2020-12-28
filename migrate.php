<?php

use App\Core\App;
use App\Core\Database\QueryBuilder;
use App\Core\Database\Connection;
use App\Core\Database\MigrateDatabase;

require 'vendor/autoload.php';
$query = require 'core/bootstrap.php';

// require $_SERVER['DOCUMENT_ROOT'] . '/' . 'Core/bootstrap.php';



// $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database'])));

MigrateDatabase::migrate(array_search('-f', $argv) !== false, array_search('-s', $argv) !== false);
