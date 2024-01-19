<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$date = '15/03/2023 3:30PM';

//$dateTime = new DateTime('tomorrow 3:35');

//echo $dateTime->format('g:i A') . PHP_EOL;

$from = new DateTime();
$to = (clone $from)->add(new DateInterval('P1M'));

var_dump($from, $to);