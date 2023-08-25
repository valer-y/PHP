<?php

namespace App;

use App\Exception\MissingValueException;
use http\Exception\InvalidArgumentException;

class Invoice
{
    public function __construct(public Customer $customer)
    {
    }

    public function process(float $ammount): void
    {
        echo "Processing " . $ammount . 'invoce - ';
        sleep(1);
        echo 'OK' . PHP_EOL;
    }
}