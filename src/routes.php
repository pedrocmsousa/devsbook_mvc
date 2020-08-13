<?php

use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');

$router->get('/cadastro', 'LoginController@signup');
$router->post('/cadastro', 'LoginController@signupAction');

$router->post('/post/new', 'PostController@new');

$router->get('/profile/{id}/photos', 'ProfileController@photos');
$router->get('/profile/{id}/friends', 'ProfileController@friends');
$router->get('/profile/{id}/follow', 'ProfileController@follow');
$router->get('/profile/{id}', 'ProfileController@index');
$router->get('/profile', 'ProfileController@index');

$router->get('/friends', 'ProfileController@friends');
$router->get('/photos', 'ProfileController@photos');

$router->get('/search', 'SearchController@index');

$router->get('/logout', 'LoginController@logout');

$router->get('/settings', 'SettingsController@setup');
$router->post('/settings', 'SettingsController@setupAction');
