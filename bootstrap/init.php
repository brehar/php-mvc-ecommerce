<?php

if (!isset($_SESSION)) {
	session_start();
}

require_once __DIR__ . '/../app/config/_env.php';

new \app\classes\Database();

set_error_handler([new \app\classes\ErrorHandler(), 'handleErrors'], E_ALL);
/** @noinspection PhpMethodParametersCountMismatchInspection */
set_exception_handler([new \app\classes\ErrorHandler(), 'handleErrors'], E_ALL);

require_once __DIR__ . '/../app/routing/routes.php';

new \app\routing\RouteDispatcher($router);
