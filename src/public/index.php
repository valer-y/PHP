<?php

declare(strict_types=1);

require_once "../Transaction.php";

$transaction1 = (new Transaction(100, 'Transaction 1'))
    ->addTax(8)
    ->applyDiscount(10);

var_dump($transaction1->getAmount());

unset($transaction1);

echo '<br /><br />';

$arr = [1, 2, 3];

$obj = (object) $arr;

var_dump($obj->{1});