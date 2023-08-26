<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use App\Invoice;

//foreach (new \App\Invoice(25) as $key => $value) {
//    echo $key . ' = ' . $value . PHP_EOL;
//}

$invoices = new \App\InvoiceCollection([new Invoice(25), new Invoice(50), new Invoice(100)]);

foreach ($invoices as $invoice) {
    echo $invoice->id . ' - ' . $invoice->amount . PHP_EOL;
}