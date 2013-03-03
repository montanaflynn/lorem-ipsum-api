<?php

// Load composer packages
require_once 'vendor/autoload.php';

// Get slim ready and waiting to return json
$app = new \Slim\Slim();
$response = $app->response();
$response['Content-Type'] = 'application/json';

// Create our faker object for the heavy lifting
$faker = Faker\Factory::create();

// Setup routing
$app->get('/', function()  use ($app) {
	$app->halt(400, json_encode(array('error'=>'You must specify an endpoint!')));
});

$app->get('/word',  function() use ($app, $faker) {
	$count = $app->request()->get('count');
	if ( !$count ) { $count = 1; }
	if ( (int)$count == $count && (int)$count > 0 ) {
		$return = array();
		for ($i=0; $i < $count; $i++) { array_push($return, $faker->word); }
		echo json_encode($return);
	} else {
		$app->halt(400, json_encode(array('error'=>'Count parameter must be a positive number!')));
	}
});

$app->get('/sentence',  function() use ($app, $faker) {
	$count = $app->request()->get('count');
	$length = $app->request()->get('length');
	if ( !$count ) { $count = 1; }
	if ( (int)$count == $count && (int)$count > 0 ) {
		$return = array();
		for ($i=0; $i < $count; $i++) { 
			if ($length) {
				if ( (int)$length == $length && (int)$length > 0 ) {
					array_push($return, $faker->sentence($length, false)); 
				} else {
					$app->halt(400, json_encode(array('error'=>'Length parameter must be a positive number!')));
				}
			} else {
				array_push($return, $faker->sentence()); 
			}
		}
		echo json_encode($return);
	} else {
		$app->halt(400, json_encode(array('error'=>'Count parameter must be a positive number!')));
	}
});

$app->get('/paragraph',  function() use ($app, $faker) {
	$count = $app->request()->get('count');
	$length = $app->request()->get('length');
	if ( !$count ) { $count = 1; }
	if ( (int)$count == $count && (int)$count > 0 ) {
		$return = array();
		for ($i=0; $i < $count; $i++) { 
			if ($length) {
				if ( (int)$length == $length && (int)$length > 0 ) {
					array_push($return, $faker->paragraph($length, false)); 
				} else {
					$app->halt(400, json_encode(array('error'=>'Length parameter must be a positive number!')));
				}
			} else {
				array_push($return, $faker->paragraph()); 
			}
		}
		echo json_encode($return);
	} else {
		$app->halt(400, json_encode(array('error'=>'Count parameter must be a positive number!')));
	}
});

$app->get('/:method', function($method) use ($app) {
	$app->halt(400, json_encode(array('error'=>'There is no endpoint named '.$method.'!')));
})->conditions(array('method' => '.+'));

$app->run();