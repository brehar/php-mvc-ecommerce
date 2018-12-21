<?php

$router = new AltoRouter();

$router->map('GET', '/', 'app\controllers\IndexController@show', 'home');
