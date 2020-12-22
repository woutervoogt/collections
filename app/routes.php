<?php

$router->get('', 'PagesController@home');

$router->get('verzamelingen', 'CollectionsController@verzamelingen');
$router->get('verzameling/aanmaken', 'CollectionsController@verzamelingAanmaken');
$router->post('verzameling/aanmaken', 'CollectionsController@store');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
