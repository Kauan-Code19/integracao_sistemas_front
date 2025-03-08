<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/user_list', 'UserController::userListView');
$routes->get('/', 'LoginController::index');
$routes->get('/user_registration', 'UserController::userRegistrationView');

$routes->post('/login', 'LoginController::logar');
$routes->post('/list_users', 'UserController::listUsers');
$routes->post('/register_user', 'UserController::registerUser');
