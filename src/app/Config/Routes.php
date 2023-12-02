<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/*
 * User related routes
 */
$routes->resource('users', ['websafe' => 1, 'only' => ['index', 'show', 'edit'], 'controller' => 'User']);
$routes->get('login', 'User::login');
$routes->post('login', 'User::login');
$routes->get('apply', 'User::apply');
$routes->post('apply', 'User::new');


