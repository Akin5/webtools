<?php

namespace App\Home;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/tools.php';

use Tracy\Debugger;
use App\Tools\Tools;

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
	$router->get('/ytdown', function () use ($template) {
		$data = [
			'tools' => true,
		];
		$template->render('templates/tools/ytdown.latte', $data);
	});
	$router->match('POST', '/ytdown', function () use ($template) {
		$data = [
			'tools' => true
		];
		if (isset($_POST['btnyt'])) {
			if (!empty($_POST['typeyt'])) {
				if (isset($_POST['urlyt'])) {
					$url = $_POST['urlyt'];
					$reg = preg_match("/(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.|m\.)?youtube\.com\/(?:watch|v|embed)(?:\.php)?(?:\?.*v=|\/))([a-zA-Z0-9\-_]+)/i", $url);
					if ($reg) {
						Tools::ytcon($url);
					} else {
						$data += [
							"error" => true,
							"message" => "URL Youtube tidak valid !"
						];
					}
				} else {
					$data += [
						"error" => true,
						"message" => "URL Youtube tidak ada !"
					];
				}
			} else {
				$data += [
					"error" => true,
					"message" => "Tipe video ga ada gan !"
				];
			}
		} else {
			$data += [
				"error" => true,
				"message" => "Hah Mau Ngapain Ga ada submit nya?"
			];
		}
		$template->render('templates/tools/ytdown.latte', $data);
	});
});
$router->match('GET', '/about', function () {
	echo 'Coming Soon yah ...';
});

$router->run();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title></title>
</head>

<body>
	<div></div>
</body>

</html>
