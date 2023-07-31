<?php

namespace App;

use PDO;

class Database
{
	public \PDO $pdo;

	protected string $username  = 'root';
	protected string $database	= "products_crud";
	protected string $pass			="12345678";
	public string $table	  	  = "products";

	public function __construct()
	{
		$this->pdo = new PDO("mysql:host=mysql;dbname={$this->database}", $this->username, $this->pass);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function getProducts($search = '')
	{
		var_dump($search);
		$query_select = "SELECT * FROM {$this->table} ORDER BY create_date DESC";
		if($search) {
			$query_select = "SELECT * FROM {$this->table} WHERE title LIKE :title ORDER BY create_date DESC";
		}

		$stmt = $this->pdo->prepare($query_select);

		if($search) {
			$stmt->bindValue(':title', "%$search%");
		}

		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
}