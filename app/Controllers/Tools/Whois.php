<?php

namespace App\Controllers\Tools;

use App\Core\Controller;

class Whois extends Controller
{
	public function index()
	{
		$this->view('tools/whois');
	}
}
