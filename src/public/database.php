<?php

$pdo = new PDO('mysql:host=sandbox-db;port=3306;dbname=my_db', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;