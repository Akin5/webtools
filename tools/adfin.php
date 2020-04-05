<?php
//
// require_once '../vendor/autoload.php';
//
// use \Twig\Environment;
// use \Twig\Loader\FilesystemLoader;
// use \Twig\TwigFunction;
//
// $load = new FilesystemLoader(__DIR__ . '/../templates');
// $load->addPath(getcwd() . '/../templates/tools', 'tools');
//
// $page = new Environment($load, [
//   'debug' => true,
//   'auto_reload' => true
// ]);
// $assets = new TwigFunction('assets', function ($asset) {
//   return sprintf(__DIR__ . '/assets/%s', ltrim($asset, '/'));
// });
// $page->addFunction($assets);
// $data = [
//   "nama" => "<h1>Gans</h1><script>alert('Gans')</script>"
// ];
//
// echo $page->render("@tools/adfin.html.twig", $data);
phpinfo();
