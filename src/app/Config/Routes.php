<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('admin', static function ($routes) {
  $routes->get('users', 'User::index');
  $routes->get('users/(:segment)', 'User::show/$1');
  $routes->post('users/(:segment)/edit', 'User::update/$1');
  $routes->get('users/new', 'User::createAdmin');
  $routes->post('users/new', 'User::newAdmin');
  $routes->post('users/deactivate', 'User::deactivate');
  $routes->post('users/delete', 'User::deleteAdmin');
});

/*
 * User related routes
 */
$routes->get('profile', 'User::show');
$routes->post('profile/update', 'User::update');
$routes->get('login', 'User::login');
$routes->post('login', 'User::login');
$routes->get('register', 'User::register');
$routes->post('register', 'User::new');
$routes->post('profile/deactivate', 'User::deactivate');
