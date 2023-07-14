<?php


$dsn = "mysql:host=mysql;dbname=data";
$db_username = "root";
$db_password = "12345678";

$sql = "CREATE TABLE Goods (
    id INT(6) AUTO_INCREMENT UNSIGNED PRIMARY KEY
  )";

try {
	$pdo = new PDO($dsn, $db_username, $db_password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo('Connection');
	echo('Db created');
} catch (PDOException $e) {
	echo $e->getMessage();
}
