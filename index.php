<?php

require 'vendor/autoload.php';

use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

$load = new FilesystemLoader(__DIR__ . '/templates');
$page = new Environment($load);

if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$data = [
		'name' => $nama
	];
} else {
	$data = [
		'name' => 'akin'
	];
}


echo $page->render("index.html.twig", $data);
