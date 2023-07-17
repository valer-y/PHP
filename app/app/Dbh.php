<?php

namespace App;

use PDO;

class Dbh
{
	private string $host   = 'mysql';
	private string $user   = 'root';
	private string $pwd 		= '12345678';
	private string $dbName = 'data';

	protected function connect() : PDO {
		$dsn = "mysql:host=$this->host;dbname=$this->dbName";
		try {
			$pdo = new PDO($dsn, $this->user, $this->pwd);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

}
