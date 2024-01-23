<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

//foreach (new \App\Invoice() as $key => $value) {
//    echo $key . ' = ' . $value . PHP_EOL;
//}


$invoiceList = new App\InvoiceCollection([new \App\Invoice(25), new \App\Invoice(35), new \App\Invoice(45)]);

foreach ($invoiceList as $invoice) {
    echo $invoice->id . ' - '. PHP_EOL;
}