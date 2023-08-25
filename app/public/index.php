<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use App\Invoice;
use App\Customer;

$invoice = new Invoice(new Customer());

try {
    $invoice->process(25);
} catch (\App\Exception\MissingValueException | \http\Exception\InvalidArgumentException $e) {
    echo $e->getFile() . $e->getMessage() . $e->getLine();
} finally {
    echo 'Finally reached' . PHP_EOL;
}

