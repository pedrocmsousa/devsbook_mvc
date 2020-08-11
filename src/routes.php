<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');

$router->get('/cadastro', 'LoginController@signup');
$router->post('/cadastro', 'LoginController@signupAction');

$router->post('/post/new', 'PostController@new');

//$router->get('/search');
//$router->get('/me');
//$router->get('/logout');
//$router->get('/friends');
//$router->get('/photos');
//$router->get('/settings');