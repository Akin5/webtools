<?php

namespace App\Router;

ini_set("memory_limit", "128M");

use Bramus\Router\Router;

use Tracy\Debugger;

Debugger::enable();
Debugger::$showBar = false;


class Route extends Router
{
	public function __construct()
	{
		$this->setNamespace('\App\Controllers');
		$this->route();
	}
	public function route()
	{
		$this->get('/', 'Home@index');
		$this->mount('/tools', function () {
			$this->get('/adfin', 'Tools\Adfin@index');
			$this->post('/adfin', 'Tools\Adfin@store');
			$this->get('/jso', 'Tools\Jso@index');
			$this->post('/jso', 'Tools\Jso@store');
		});
	}
}
