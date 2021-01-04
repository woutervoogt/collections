<?php

use App\Core\App;
use App\Core\Database\QueryBuilder;
use App\Core\Database\Connection;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database'])));

session_start();

function view($fileName, $data = [])
{
    return require "app/views/$fileName.view.php";
}

function redirect($path)
{
    header("Location: /$path");
    exit();
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

function pluralize($quantity, $singular, $plural=null)
{
    if ($quantity==1 || !strlen($singular)) {
        return $singular;
    }
    if ($plural!==null) {
        return $plural;
    }

    $last_letter = strtolower($singular[strlen($singular)-1]);
    switch ($last_letter) {
        case 'y':
            return substr($singular, 0, -1).'ies';
        case 's':
            return $singular.'es';
        default:
            return $singular.'s';
    }
}
