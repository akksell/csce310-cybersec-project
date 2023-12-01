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
 */
$routes->group("program", function($routes){

	// Call - <url>/program
	$routes->get("/", "ProgramController::index");
	// Call - <url>/program/add
	$routes->get("add", "ProgramController::insertProgram");
	// Call - <url>/program/update
	$routes->get("update", "ProgramController::updateProgram");
	// Call - <url>/program/delete
	$routes->get("delete", "ProgramController::deleteProgram");
});


