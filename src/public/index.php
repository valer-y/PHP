<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Invoice;

$invoice = new Invoice(15);

echo $invoice->amount . PHP_EOL;

//$invoice->status = 15;
