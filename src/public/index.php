<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\ToasterPro;
use App\FancyOven;
use App\PaymentGateway\Paddle\Transaction;

$toaster = new ToasterPro();


$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');

$toaster->toast();
//$transaction = new Transaction(25);
//
//$transaction->process();

