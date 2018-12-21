<?php

$router = new AltoRouter();

$router->map('GET', '/', '', 'home');

$match = $router->match();

if ($match) {
	require_once __DIR__ . '/../controllers/BaseController.php';
	require_once __DIR__ . '/../controllers/IndexController.php';

	$index = new \app\controllers\IndexController();

	$index->show();
} else {
	header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
	echo 'Page Not Found';
}
