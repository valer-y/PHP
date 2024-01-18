<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Invoice;
use App\Customer;

$invoice = new Invoice(new Customer());

$invoice->process(25);