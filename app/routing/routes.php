<?php

$router = new AltoRouter();

$router->map('GET', '/', 'app\controllers\IndexController@show', 'home');
$router->map('GET', '/admin', 'app\controllers\admin\DashboardController@show', 'admin_dashboard');
