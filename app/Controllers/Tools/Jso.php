<?php

namespace App\Controllers\Tools;

use App\Core\Controller;

class Jso extends Controller
{
	private $api_dev_key = "fbd8a04f72804215a6a332fc74a7a173";
	private $api_paste_code = "";
	private $api_paste_private = '0';
	private $api_paste_name = "";
	private $api_paste_format = "javascript";
	private $api_paste_expire_date = 'N';
	private $api_url = "https://pastebin.com/api/api_post.php";
	private $api_user_key = "";

	public function index()
	{
		$this->view('tools/jso');
	}

	public function store()
	{
		$data = ["error" => "", "code" => ""];
		if (isset($_POST) && !empty($_POST)) {
			if (isset($_POST['scjso']) && !empty($_POST['scjso'])) {
				$_code = $_POST['resultjso'];
				$this->api_paste_name = urlencode(uniqid() . rand('1', '99999') . '.js');
				$this->api_paste_code = urlencode($_code);
				$_data_post = "api_option=paste&api_user_key={$this->api_user_key}'&api_paste_private={$this->api_paste_private}&api_paste_name={$this->api_paste_name}&api_paste_code={$this->api_paste_code}&api_paste_expire_date={$this->api_paste_expire_date}&api_paste_format={$this->api_paste_format}&api_dev_key={$this->api_dev_key}";
				$_ex = str_replace('https://pastebin.com', 'https://pastebin.com/raw', curl($this->api_url, true, $_data_post));
				$code = '<script type="text/javascript" src="' . $_ex . '"></script>';
				$data["code"] = $code;
			} else {
				$data["error"] = "Script JSO Tidak ada !";
			}
		} else {
			$data['error'] = "Error, Kesalahan tidak di ketahui !";
		}
		$this->view('tools/jso', $data);
	}
}
