<?php

session_start();

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/functions.php';

use \App\Router\Route;

$app = new Route;
$app->run();

// $router->mount('/tools', function () use ($router, $template) {
//   $router->match('GET', '/', function () {
//     echo "Ngapain ? ... h3h3";
//   });
//   $router->match('GET|POST', '/adfin', function ()  use ($template) {
//   });
//   $router->match('GET|POST', '/jso', function () use ($template) {
//     $data = [];
//     if (isset($_POST['btnjso'])) {
//       if (isset($_POST['scjso'])) {
//       } else {
//         $data += [
//           "error" => "Script JSO Tidak ada ! Harap Convert dulu !"
//         ];
//       }
//     }
//     $template->render('templates/tools/jso.latte', $data);
//   });
// });
//

// $router->match('POST', '/like', function () {
//   if (isset($_POST['like'])) {
//     $file = fopen('views/likes.txt', 'r');
//     if (!$file) {
//       echo "Tolong Refresh page anda !";
//       die();
//     } else {
//       $like = (int) fread($file, 20);
//       fclose($file);
//       $like++;
//       $file = fopen('views/likes.txt', 'w');
//       fwrite($file, $like);
//       fclose($file);
//       echo $like;
//     }
//   } else if (isset($_POST['unlike'])) {
//     $file = fopen('views/likes.txt', 'r');
//     if (!$file) {
//       echo "Tolong Refresh page anda !";
//       die();
//     } else {
//       $unlike = (int) fread($file, 20);
//       fclose($file);
//       $unlike--;
//       $file = fopen('views/likes.txt', 'w');
//       fwrite($file, $unlike);
//       fclose($file);
//       echo $unlike;
//     }
//   }
// });
// $router->match('POST', '/dislike', function () {
//   if (isset($_POST['dislike'])) {
//     $file = fopen('views/dislikes.txt', 'r');
//     if (!$file) {
//       echo "Tolong Refresh page anda !";
//       die();
//     } else {
//       $dislike = (int) fread($file, 20);
//       fclose($file);
//       $dislike++;
//       $file = fopen('views/likes.txt', 'w');
//       fwrite($file, $dislike);
//       fclose($file);
//       echo $dislike;
//     }
//   } else if (isset($_POST['undislike'])) {
//     $file = fopen('views/dislikes.txt', 'r');
//     if (!$file) {
//       echo "Tolong Refresh page anda !";
//       die();
//     } else {
//       $undislike = (int) fread($file, 20);
//       fclose($file);
//       $undislike--;
//       $file = fopen('views/dislikes.txt', 'w');
//       fwrite($file, $undislike);
//       fclose($file);
//       echo $undislike;
//     }
//   }
// });
//
