<?php

namespace App\Controllers\Tools;

use App\Core\Controller;

class Adfin extends Controller
{
	public function index()
	{
		$this->view('tools/adfin');
	}
	public function store()
	{
		$data = ["error" => "", "show" => "", "pound" => "", "notpound" => ""];
		if (isset($_POST['btnad'])) {
			$pound = [];
			$notpund = [];
			$wd = file("app/data/txt/adminfind.txt");
			if (isset($_POST['urlad'])) {
				$url = strtok($_POST['urlad'], '?');
				if (filter_var($url, FILTER_VALIDATE_URL)) {
					$data['show'] = true;
					if (!endswith($url, '/')) {
						$url = $url . '/';
					}
					foreach ($wd as $vl) {
						$web = $url . $vl;
						if (curl($web)) {
							array_push($pound, $web);
						} else {
							array_push($notpund, $web);
						}
					}
					$data['pound'] = $pound;
					$data['notpound'] = $notpund;
				} else {
					$data['error'] = "URL Tidak valid !";
				}
			} else {
				$data['error'] = "URL Tidak ada !";
			}
		} else {
			$data['error'] = "Error, Kesalahan tidak di ketahui !";
		}

		$this->view('tools/adfin', $data);
	}
}
