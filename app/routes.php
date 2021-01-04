<?php

$router->get('', 'PagesController@home');

$router->get('verzamelingen', 'CollectionsController@index');
$router->get('verzameling/aanmaken', 'CollectionsController@verzamelingAanmaken');
$router->post('verzameling/aanmaken', 'CollectionsController@store');

$router->get('verzameling', 'ItemsController@index');


// $router->get('users', 'UsersController@index');

$router->post('inloggen', 'LoginController@login');
$router->get('uitloggen', 'LoginController@logout');

$router->get('registreren', 'RegisterController@index');
$router->post('registreren', 'RegisterController@store');
