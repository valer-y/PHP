<?php

$host   = 'mysql';
$user   = 'root';
$pwd 	= '12345678';
$dbName = 'products_crud';

$dsn = "mysql:host=$host;port=3306;dbname=$dbName";

$pdo = new PDO($dsn, $user, $pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;