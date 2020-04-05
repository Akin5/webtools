<?php

require __DIR__ . '/vendor/autoload.php';

use Tracy\Debugger;

Debugger::enable();
Debugger::$showBar = false;

$router = new \Bramus\Router\Router();
$template = new \Latte\Engine();

$router->match('GET', '/', function () use ($template) {
	$template->render('templates/index.latte');
});
$router->mount('/tools', function () use ($router, $template) {
	$router->match('GET', '/', function () {
		echo "Ngapain ? ... h3h3";
	});
	$router->match('GET', '/ytdown', function () use ($template) {
		$template->render('templates/tools/ytdown.latte', ['tools' => true]);
	});
});
$router->match('GET', '/about', function () {
	echo 'Coming Soon yah ...';
});

$router->run();
