<?php

session_start();

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/tools.php';

use Tracy\Debugger;

Debugger::enable();
Debugger::$showBar = false;

$router = new \Bramus\Router\Router();
$template = new \Latte\Engine();

$template->addFunction('base_url', function () {
	if (isset($_SERVER['HTTP_HOST'])) {
		$http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
		$hostname = $_SERVER['HTTP_HOST'];
		$dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
		$core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
		$core = $core[0];
		$tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
		$end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
		$base_url = sprintf($tmplt, $http, $hostname, $end);
	} else $base_url = 'http://localhost/';
	if ($parse) {
		$base_url = parse_url($base_url);
		if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
	}
	return $base_url;
});

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
	}
	$template->render('templates/index.latte');
});
$router->mount('/tools', function () use ($router) {
	$router->match('GET', '/', function () {
		echo "Ngapain ? ... h3h3";
	});
});
$router->match('POST', '/like', function () {
	if (isset($_POST['like'])) {
		if (!$_SESSION['like']) {
			$file = fopen('views/likes.txt', 'r');
			if (!$file) {
				echo "Tolong Refresh page anda !";
				die();
			} else {
				$like = (int) fread($file, 20);
				fclose($file);
				$like++;
				$file = fopen('views/likes.txt', 'w');
				fwrite($file, $like);
				fclose($file);
				$_SESSION['like'] = true;
				echo $like;
			}
		}
	} else {
		$file = fopen('views/likes.txt', 'r');
		if (!$file) {
			echo "Tolong Refresh page anda !";
			die();
		} else {
			$like = (int) fread($file, 20);
			fclose($file);
			echo $like;
		}
	}
});
// $router->match('POST', '/dislike', function () {
//   if (!$_SESSION['like']) {
//     if (isset($_POST['dislike'])) {
//       $file = fopen('views/dislikes.txt', 'r');
//       if (!$file) {
//         echo "Tolong Refresh page anda !";
//         die();
//       } else {
//         $dislike = (int) fread($file, 20);
//         fclose($file);
//         $dislike++;
//         $file = fopen('views/dislikes.txt', 'w');
//         fwrite($file, $dislike);
//         fclose($file);
//         $_SESSION['dislike'] = true;
//         echo $dislike;
//       }
//     }
//   } else {
//     $file = fopen('views/likes.txt', 'r');
//     if (!$file) {
//       echo "Tolong Refresh page anda !";
//       die();
//     } else {
//       $dislike = (int) fread($file, 20);
//       fclose($file);
//       $dislike--;
//       $file = fopen('views/likes.txt', 'w');
//       fwrite($file, $dislike);
//       fclose($file);
//       $_SESSION['dislike'] = false;
//       echo $like;
//     }
//   }
// });

$router->run();
