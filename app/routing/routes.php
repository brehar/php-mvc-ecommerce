<?php

$router = new AltoRouter();

$router->map('GET', '/about', '', 'about_us');

$match = $router->match();

if ($match) {
	echo 'About Us Page';
} else {
	header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
	echo 'Page Not Found';
}
