<?php

namespace App;

use App\Exception\MissingBillingException;
use http\Exception\InvalidArgumentException;
use http\Exception\RuntimeException;

class Invoice
{
   public string $id;

   public function __construct(public float $amount)
   {
       $this->id = random_int(100, 99999);
   }
}