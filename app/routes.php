<?php

$router->get('', 'PagesController@home');
$router->get('verzamelingen', 'PagesController@verzamelingen');
$router->get('verzameling/toevoegen', 'PagesController@verzamelingToevoegen');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
