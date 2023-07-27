<?php

namespace App;

use PDO;

class Database
{

	public \PDO $pdo;
	private string $host   = 'mysql';
	private string $user   = 'root';
	private string $pwd 		= '12345678';
	private string $dbName = 'products_crud';

	public function __construct()
	{
		$dsn = "mysql:host=$this->host;dbname=$this->dbName";
		$this->pdo = new PDO($dsn, $this->user, $this->pwd);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function getProducts($search = '')
	{
		$search = $_GET['search'] ?? '';

		$query = "SELECT * FROM products ORDER BY create_date DESC";
		$query_search = "SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC";

		if($search) {
			$stmt = $this->pdo->prepare($query_search);
			$stmt->bindValue(':title', "%$search%");
		} else {
			$stmt = $this->pdo->prepare($query);
		}

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}