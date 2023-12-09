<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('error', 'ErrorHandler::index');

$routes->group('admin', static function ($routes) {
  $routes->get('users', 'User::index');
  $routes->get('users/@(:segment)', 'User::show/$1');
  $routes->get('users/@(:segment)/edit', 'User::edit/$1');
  $routes->post('users/(:segment)/update', 'User::update/$1');
  $routes->get('users/new', 'User::createAdmin');
  $routes->post('users/new', 'User::newAdmin');
  $routes->post('users/(:segment)/deactivate', 'User::deactivate/$1');
  $routes->post('users/(:segment)/delete', 'User::delete/$1');
  $routes->post('users/promote/(:segment)', 'User::promote/$1');
  $routes->post('users/(:segment)/updatePassword', 'User::updatePassword/$1');
});

/*
 * User related routes
 */
$routes->get('profile', 'User::show');
$routes->get('profile/edit', 'User::edit');
$routes->post('profile/update', 'User::update');
$routes->get('login', 'User::login');
$routes->post('login', 'User::login');
$routes->post('logout', 'User::logout');
$routes->get('register', 'User::register');
$routes->post('register', 'User::new');
$routes->post('profile/deactivate', 'User::deactivate');
$routes->post('profile/updatePassword', 'User::updatePassword');
