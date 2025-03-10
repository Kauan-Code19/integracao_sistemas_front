<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->get('/user_list', 'UserController::userListView');
$routes->get('/user_edit/(:num)', 'UserController::userEditView/$1');
$routes->get('/user_registration', 'UserController::userRegistrationView');
$routes->get('/list_users', 'UserController::listUsers');

$routes->post('/login', 'LoginController::logar');
$routes->post('/register_user', 'UserController::registerUser');

$routes->put('/edit_user', 'UserController::editUser');
