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

/*
 * Program related routes
 * Evan Burriola 
 */
$routes->group("program", function($routes){

	$routes->get("/", "ProgramController::index");
	$routes->get("create", "ProgramController::create");
	$routes->post("new", "ProgramController::new");
	$routes->get("edit/(:num)", "ProgramController::edit/$1");
	$routes->post("update/(:num)", "ProgramController::update/$1");
	$routes->get("delete/(:num)", "ProgramController::delete/$1");
	$routes->post("destroy/(:num)", "ProgramController::destroy/$1");
	$routes->get("show/(:num)", "ProgramController::show/$1");
});

/*
 * Application related routes
 * Evan Burriola 
 */
$routes->group("application", function($routes){

	$routes->get("/", "ApplicationController::index");
	$routes->get("create", "ApplicationController::create");
	$routes->post("new", "ApplicationController::new");
});


