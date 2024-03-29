<?php

namespace App\Router;

ini_set("memory_limit", "128M");

use Bramus\Router\Router;
use Tracy\Debugger;

class Route extends Router
{
	public function __construct()
	{
		Debugger::enable();
		Debugger::$showBar = false;
		$this->setNamespace('\App\Controllers');
		$this->route();
	}
	public function route()
	{
		$this->get('/', 'Home@index');
		$this->mount('/tools', function () {
			// Admin Finder
			$this->get('/adfin', 'Tools\Adfin@index');
			$this->post('/adfin', 'Tools\Adfin@store');

			// JSO Generator
			$this->get('/jso', 'Tools\Jso@index');
			$this->post('/jso', 'Tools\Jso@store');

			// Generate Hash
			$this->get('/genhash', 'Tools\GenHash@index');
			$this->post('/genhash', 'Tools\GenHash@store');

			// Encode & Decode Base64
			$this->get('/encdec', 'Tools\EncDec@index');

			// Whois Lookup
			$this->get('/whois', 'Tools\Whois@index');
		});
		$this->set404(function () {
			echo "Gada gan";
		});
	}
}
