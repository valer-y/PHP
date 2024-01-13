<?php

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;

class Transaction
{
    static public int $counter = 0;

    public function __construct(
        private int $amount,
        private string $description
    )
    {
        echo "Paddle transaction created..." . $this->amount . ' ' . $this->description . '<br />';
        self::$counter++;
    }

    static public function getCounter() : int
    {
        return self::$counter;
    }

}