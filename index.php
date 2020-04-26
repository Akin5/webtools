<?php

use App\Router\Route;

session_start();

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/functions.php';

$app = new Route;
$app->run();
