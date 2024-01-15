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

$fields = [
    //new \App\Field('baseField'), // Abstract ?
    new \App\Text('textField'),
    new \App\Radio('radioField')
];

foreach ($fields as $field) {
    echo $field->render() . '<br />';
}
