<?php

namespace App;

class Invoice
{
    public string $id;

    /**
     * @throws \Exception
     */
    public function __construct(public float $amount)    {
        $this->id = random_int(1000, 99999);
    }
}