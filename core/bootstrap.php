<?php

use App\Core\App;
use App\Core\Database\QueryBuilder;
use App\Core\Database\Connection;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database'])));

function view($fileName, $data = [])
{
    return require "app/views/$fileName.view.php";
}

function redirect($path)
{
    header("Location: /$path");
}

function dd()
{
    $args = func_get_args();

    if (count($args)) {
        echo "<pre>";

        foreach ($args as $arg) {
            var_dump($arg);
        }

        echo "</pre>";

        die();
    }
}
