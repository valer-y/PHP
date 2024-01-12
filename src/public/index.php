<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;

$id = new \Ramsey\Uuid\UuidFactory();

echo $id->uuid4();

$paddleTransaction = new Transaction();

var_dump($paddleTransaction);