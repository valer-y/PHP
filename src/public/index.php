<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;
use App\Enums\Status;

$transaction = new Transaction(25 , 'Transaction 1');
$transaction = new Transaction(25 , 'Transaction 1');
$transaction = new Transaction(25 , 'Transaction 1');
$transaction = new Transaction(25 , 'Transaction 1');

var_dump(Transaction::getCount());
