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
	$routes->get("edit/(:num)/(:num)", "ApplicationController::edit/$1/$2");
	$routes->post("update/(:num)", "ApplicationController::update/$1");
	$routes->get("delete/(:num)", "ApplicationController::delete/$1");
	$routes->post("destroy/(:num)", "ApplicationController::destroy/$1");
});

/*
 * Event related routes
 * Min Zhang
 */
$routes->group("event", function($routes){
	$routes->get("/", "Event::index");
	$routes->get("create", "Event::create");
	$routes->post("new", "Event::new");
	$routes->get("edit/(:num)", "Event::edit/$1");
	$routes->post("update/(:num)", "Event::update/$1");
	$routes->get("delete/(:num)", "Event::delete/$1");
	$routes->post("destroy/(:num)", "Event::destroy/$1");
	$routes->get("show/(:num)", "Event::show/$1");
});

/*
 * Event tracking related routes
 * Min Zhang
 */
$routes->group("event_tracking", function($routes){
	$routes->get("/", "EventTracking::index");
	$routes->get("create", "EventTracking::create");
	$routes->post("new", "EventTracking::new");
	$routes->get("edit/(:num)", "EventTracking::edit/$1");
	$routes->post("update/(:num)", "EventTracking::update/$1");
	$routes->get("delete/(:num)", "EventTracking::delete/$1");
	$routes->post("destroy/(:num)", "EventTracking::destroy/$1");
	$routes->get("show/(:num)", "EventTracking::show/$1");
});
