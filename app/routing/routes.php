<?php

$router = new AltoRouter();

$router->map('GET', '/', 'app\controllers\IndexController@show', 'home');

$router->map('GET', '/admin', 'app\controllers\admin\DashboardController@show', 'admin_dashboard');
$router->map(
	'GET',
	'/admin/products/categories',
	'app\controllers\admin\CategoriesController@show',
	'admin_categories'
);
$router->map(
	'POST',
	'/admin/products/categories',
	'app\controllers\admin\CategoriesController@create',
	'create_category'
);
