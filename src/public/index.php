<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;
use App\Enums\Status;

$transaction = new Transaction();

$transaction->setStatus(Status::DECLINED);

var_dump($transaction);
