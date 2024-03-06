<?php

declare(strict_types = 1);

use Dotenv\Dotenv;
use Doctrine\DBAL\DriverManager;
use App\Entity\Invoice;
use App\Enums\InvoiceStatus;
use App\Entity\InvoiceItem;
use Doctrine\ORM\Tools\Setup;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$items = [['Item 1', 1, 15], ['Item 2', 2 ,7.5], ['Item 3', 4, 3.75]];

$invoice = (new Invoice())
    ->setAmount(45)
    ->setInvoiceNumber('1')
    ->setStatus(InvoiceStatus::Pending)
    ->setCreatedAt(new DateTime());

foreach ($items as [$description, $quataty, $unitPrice]) {
    $item = (new InvoiceItem())
        ->setDescription($description)
        ->setQuantity($quataty)
        ->setUnitPrice($unitPrice);

    $invoice->addItem($item);
}

$params = [
    'dbname' => $_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => 'pdo_mysql',
];
