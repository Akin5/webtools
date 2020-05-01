<?php

namespace App\Config;

return [
	'APPATH' => realpath(dirname(__DIR__)),
	"database" => [
		"DB_NAME" => "webtools",
		"DB_HOST" => "localhost",
		"DB_USER" => "root",
		"DB_PASS" => "root"
	]
];
