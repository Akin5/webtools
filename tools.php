<?php

namespace App\Tools;

class Tools
{
	public static function ytcon($url)
	{
		// validate url
		$split = "/(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.|m\.)?youtube\.com\/(?:watch|v)?(?:\?.*v=))/i";
		if (self::checkurl($url, $split)) {
			// split
			$_id = preg_split($split, $url);
			if (empty($_id[0])) {
				$id = $_id[1];
				echo $id;
			}
		}
	}
	protected static function checkurl($url, $regex)
	{
		$r = preg_match($regex, $url);
		if ($r) {
			return true;
		} else {
			return false;
		}
	}
}

