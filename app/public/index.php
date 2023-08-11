<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use App\DebtCollectionService;

$collector = new DebtCollectionService();

echo $collector->collectDebt(new \App\CollectionAgency()) . PHP_EOL;
