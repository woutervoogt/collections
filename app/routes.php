<?php

$router->get('', 'PagesController@home');

$router->get('verzamelingen', 'CollectionsController@index');
$router->get('verzamelingen/aanmaken', 'CollectionsController@createCollection');
$router->post('verzamelingen/aanmaken', 'CollectionsController@store');
$router->get('verzamelingen/aanpassen', 'CollectionsController@edit');
$router->post('verzamelingen/aanpassen', 'CollectionsController@update');
$router->post('verzamelingen/verwijderen', 'CollectionsController@destroy');

$router->get('verzameling', 'ItemsController@index');


// $router->get('users', 'UsersController@index');

$router->post('inloggen', 'LoginController@login');
$router->get('uitloggen', 'LoginController@logout');

$router->get('registreren', 'RegisterController@index');
$router->post('registreren', 'RegisterController@store');
