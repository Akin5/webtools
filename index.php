<?php

session_start();

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/tools.php';
require __DIR__ . '/core/database.php';

use Tracy\Debugger;

Debugger::enable();
Debugger::$showBar = false;

$router = new \Bramus\Router\Router();
$template = new \Latte\Engine();

$router->match('GET', '/', function () use ($template) {
	if (!isset($_SESSION['visit'])) {
		$file = fopen('views/visitor.txt', 'r');
		if (!$file) {
			echo "Tolong refresh page anda !";
			die();
		} else {
			$count = (int) fread($file,  20);
			fclose($file);
			$count++;
			$data = [
				"visitor" => $count
			];
			$file = fopen('views/visitor.txt', 'w');
			fwrite($file, $count);
			fclose($file);
			$_SESSION['visit'] = $count;
		}
	} else {
		$file = fopen('views/visitor.txt', 'r');
		if (!$file) {
			echo "Tolong refresh page anda !";
			die();
		} else {
			$count = (int) fread($file,  20);
			if (!$count == $_SESSION['visit']) {
				$_SESSION['visit'] = $count;
			}
		}
		$data = [
			"visitor" => $count
		];
	}
	$template->render('templates/index.latte', $data);
});
$router->mount('/tools', function () use ($router, $template) {
	$router->match('GET', '/', function () {
		echo "Ngapain ? ... h3h3";
	});
});
$router->match('POST', '/', function () {
	if (isset($_POST['like'])) {
		$like = (int) $_POST['like'];
		$like++;
		$file = fopen('views/likes.txt', 'w');
		if (!$file) {
			echo "Tolong Refresh page anda !";
			die();
		} else {
			fwrite($file, $like);
			fclose($file);
			$data = [
				"like" => $like
			];
			echo json_encode($data, JSON_PRETTY_PRINT);
		}
	}
});

$router->run();
$db = new Database();

