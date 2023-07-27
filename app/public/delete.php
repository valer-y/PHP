<?php

$id = $_POST['id'] ?? null;

if(!$id) {
	header('Location: index/php');
	exit;
}

$username="root";
$databse="products_crud";
$pass="12345678";
$table = "products";

$pdo = new PDO("mysql:host=mysql;dbname={$databse}", $username, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query_delete = "DELETE FROM products WHERE id= :id";
$stmt = $pdo->prepare($query_delete);
$stmt->bindValue(':id', $id);
$stmt->execute();

header('Location: index/php');