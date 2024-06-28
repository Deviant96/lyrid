<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/loginSubmit', 'Auth::loginSubmit');
$routes->get('/logout', 'Auth::logout');

$routes->get('/register', 'Auth::register');
$routes->post('/registerSubmit', 'Auth::registerSubmit');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'Dashboard::index');

    $routes->get('/users', 'User::index');
    $routes->get('/users/create', 'User::create');
    $routes->post('/users/store', 'User::store');
    $routes->get('/users/edit/(:num)', 'User::edit/$1');
    $routes->post('/users/update/(:num)', 'User::update/$1');
    $routes->get('/users/delete/(:num)', 'User::delete/$1');

    $routes->get('/employees', 'Employee::index');
    $routes->get('/employees/create', 'Employee::create');
    $routes->post('/employees/store', 'Employee::store');
    $routes->get('/employees/edit/(:num)', 'Employee::edit/$1');
    $routes->post('/employees/update/(:num)', 'Employee::update/$1');
    $routes->get('/employees/delete/(:num)', 'Employee::delete/$1');
});