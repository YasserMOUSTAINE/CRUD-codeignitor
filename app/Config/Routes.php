<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace("App\Controllers"); 
$routes->setDefaultController('Home'); 
$routes->setDefaultMethod("index"); 

// Home route
$routes->get('/', 'Home::index');

// Student routes
$routes->group('students', function ($routes) {
    $routes->get('/', 'StudentController::index');
    $routes->get('new', 'StudentController::new');
    $routes->post('create', 'StudentController::create');
    $routes->get('edit/(:num)', 'StudentController::edit/$1');
    $routes->post('update/(:num)', 'StudentController::update/$1');
    $routes->get('delete/(:num)', 'StudentController::delete/$1');
});
$routes->group('auth', function($routes) {
    $routes->get('register', 'AuthController::register');
    $routes->post('registerUser', 'AuthController::registerUser');
    $routes->get('login', 'AuthController::login');
    $routes->post('loginUser', 'AuthController::loginUser');
    $routes->get('logout', 'AuthController::logout');
});
