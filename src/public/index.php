<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\CollectionAgency;

$collector = new \App\DebtCollectionService();

echo $collector->collectDebt(new CollectionAgency) . PHP_EOL;
