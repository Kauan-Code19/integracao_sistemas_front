<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'Home::index');
$routes->get('/', 'LoginController::index');
$routes->get('/user_registration', 'UserController::userRegistrationView');

$routes->post('/login', 'LoginController::logar');
$routes->post('/register_user', 'UserController::registerUser');
