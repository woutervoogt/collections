<?php
ini_set('display_errors', 1);

use App\Core\Router;
use App\Core\Request;

define('DOCROOT', __DIR__);

require 'vendor/autoload.php';
require 'core/bootstrap.php';

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
