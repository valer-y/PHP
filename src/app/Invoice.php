<?php

namespace App;

use App\Exception\MissingBillingException;
use http\Exception\InvalidArgumentException;
use http\Exception\RuntimeException;

class Invoice
{
    public function __construct(
        public Customer $customer
    )
    {
    }

    public function process(float $amount) : void
    {
        if($amount <= 0) {
            throw new \Exception('Invalid amount');
        }

        if(empty($this->customer->getBillingInfo())) {
            throw new MissingBillingException();
        }

        echo 'Processing $' . $amount . ' invoice - ';

        sleep(1);

        echo 'OK' . PHP_EOL;
    }


}