<?php

require '../vendor/autoload.php';

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

$load = new FilesystemLoader(__DIR__ . '/../templates');
$page = new Environment($load);

echo $page->render('tools/adfin.html.twig');

