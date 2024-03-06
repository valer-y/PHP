<?php

declare(strict_types = 1);

use Dotenv\Dotenv;
use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$connectionParams = [
    'dbname' => $_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);

//$stmt = $conn->prepare('SELECT * FROM invoices WHERE id= :id');
//$result = $stmt->executeQuery([':id' => 1]);
//
//var_dump($result->fetchAssociative());

