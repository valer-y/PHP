<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction(25, 'Transaction1');
$transaction = new Transaction(25, 'Transaction1');
$transaction = new Transaction(25, 'Transaction1');
$transaction = new Transaction(25, 'Transaction1');


var_dump(Transaction::getCounter());
