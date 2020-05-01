<?php

namespace App\Controllers\Tools;

use App\Core\Controller;

class GenHash extends Controller
{
	public function index()
	{
		$this->view('tools/genhash');
	}
	public function store()
	{
		$data = ["hash" => ""];
		if (isset($_POST['btngenhash'])) {
			if (isset($_POST['text_genhash']) && !empty($_POST['text_genhash'])) {
				$text = $_POST['text_genhash'];
				$listhash = hash_algos();
				$hsh = [];
				foreach ($listhash as $hash) {
					$m = hash($hash, $text);
					$hsh += [
						$hash => [strlen($m), $m]
					];
				}
				$data['hash'] = $hsh;
			}
			$this->view('tools/genhash', $data);
		}
	}
}
