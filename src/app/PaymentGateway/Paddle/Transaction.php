<?php

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;

class Transaction
{
    static public int $count = 0;

    public function __construct(
        public float $amount,
        public string $description
    ) {
        self::$count++;
    }

    static public function getCount() {
        return self::$count;
    }

    public function process()
    {
        echo 'Process paddle transaction...';
    }
}