<?php

define('BASE_PATH', dirname(__DIR__, 2) . '/');

require_once __DIR__ . '/../../vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(BASE_PATH);
$dotEnv->load();
