<?php

require_once __DIR__ . '/vendor/autoload.php';


$router = new Bramus\Router\Router();
$template = new \Latte\Engine();

$template->render('templates/index.latte');
