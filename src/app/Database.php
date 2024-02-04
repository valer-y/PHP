<?php

namespace App;

use PDO;

class Database
{
    public \PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=sandbox-db;port=3306;dbname=my_db', 'root', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getProducts($search = '')
    {
        if($search) {
            $statement = $this->pdo->prepare("SELECT * FROM products WHERE title LIKE :title");
            $statement->bindValue(':title', "%$search%");
        } else {
            $statement = $this->pdo->prepare("SELECT * FROM products");
        }

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($products);
    }
}