<?php

use App\Core\Middleware\IsLoggedIn;
use App\Core\Middleware\IsOwner;

$router->get('', 'PagesController@home');

$router->get('verzamelingen', 'CollectionsController@index', [IsLoggedIn::class]);
$router->get('verzamelingen/aanmaken', 'CollectionsController@create', [IsLoggedIn::class]);
$router->post('verzamelingen/aanmaken', 'CollectionsController@store', [IsLoggedIn::class]);
$router->get('verzamelingen/aanpassen', 'CollectionsController@edit', [IsLoggedIn::class, IsOwner::class]);
$router->post('verzamelingen/aanpassen', 'CollectionsController@update', [IsLoggedIn::class]);
$router->post('verzamelingen/verwijderen', 'CollectionsController@destroy', [IsLoggedIn::class]);

$router->get('verzameling', 'ItemsController@index');
$router->get('items', 'ItemsController@show');
$router->get('items/aanmaken', 'ItemsController@create', [IsLoggedIn::class]);
$router->post('items/aanmaken', 'ItemsController@store', [IsLoggedIn::class]);
$router->get('items/aanpassen', 'ItemsController@edit', [IsLoggedIn::class]);
$router->post('items/aanpassen', 'ItemsController@update', [IsLoggedIn::class]);
$router->post('items/verwijderen', 'ItemsController@destroy', [IsLoggedIn::class]);


// $router->get('users', 'UsersController@index');

$router->get('inloggen', 'LoginController@index');
$router->post('inloggen', 'LoginController@login');
$router->get('uitloggen', 'LoginController@logout');

$router->get('registreren', 'RegisterController@index');
$router->post('registreren', 'RegisterController@store');
