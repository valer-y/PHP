<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$invoice = new \App\Invoice(25, 'Invoice1', '1290424980249');

$str = serialize($invoice);

$invoice2 = unserialize($str);

var_dump($invoice2);