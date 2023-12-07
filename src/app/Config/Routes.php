<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('admin', static function ($routes) {
  $routes->get('users', 'User::index');
  $routes->get('users/(:segment)', 'User::show/$1');
  $routes->get('users/(:segment)/edit', 'User::edit/$1');
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
$routes->get('profile/edit', 'User::edit');
$routes->post('profile/update', 'User::update');
$routes->get('login', 'User::login');
$routes->post('login', 'User::login');
$routes->get('register', 'User::register');
$routes->post('register', 'User::new');
$routes->post('profile/deactivate', 'User::deactivate');

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
	$routes->post("new/(:num)", "EventTracking::new/$1");
	$routes->get("delete/(:num)", "EventTracking::delete/$1");
	$routes->post("destroy/(:num)", "EventTracking::destroy/$1");
});

/*
 * Document related routes
 * Min Zhang
 */
$routes->group("document", function($routes){
	$routes->get("create/(:num)", "Document::create/$1");
	$routes->post("new/(:num)", "Document::new/$1");
	$routes->get("edit/(:num)", "Document::edit/$1");
	$routes->post("update/(:num)", "Document::update/$1");

	$routes->post("destroy/(:num)", "Document::destroy/$1");
	$routes->get("show/(:num)", "Document::show/$1");
});
