<?php

if (!isset($_SESSION)) {
	session_start();
}

require_once __DIR__ . '/../app/config/_env.php';
require_once __DIR__ . '/../app/routing/routes.php';

new \app\routing\RouteDispatcher($router);
