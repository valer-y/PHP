<?php

$id = $_POST['id'] ?? null;

$pdo = new PDO('mysql:host=sandbox-db;port=3306;dbname=my_db', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//var_dump($id);

if( !$id) {
    header('Location: index.php');
    exit();
}

$statement = $pdo->prepare("DELETE FROM products WHERE id = :id");
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');