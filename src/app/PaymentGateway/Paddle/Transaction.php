<?php

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;

class Transaction
{
//    private string $status;

    public function __construct()
    {
        $this->setStatus(Status::DECLINED);
    }

    public function setStatus(string $status) : self
    {
        $this->status = $status;

        return $this;
    }

}