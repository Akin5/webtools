<?php

// Class Database


class Database
{
	protected $dbh, $stmt;
	protected $filedb = "database.db";
	public function __construct()
	{
		try {
			$this->dbh = new PDO('sqlite:' . $this->filedb);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public static function get($table)
	{
		$sql = "SELECT * FROM " . $table;
		$this->stmt = $this->dbh->prepare($sql);
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
