<?php

$router->get('', 'PagesController@home');
$router->get('verzamelingen', 'PagesController@verzamelingen');
$router->get('contact', 'PagesController@contact');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
