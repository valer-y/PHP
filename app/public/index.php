<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$date1 = new DateTime('05/25/2023 9:15 AM');
$date2 = new DateTime('01/25/2023 9:15 AM');
$interval = new DateInterval('P2M3D');

//var_dump($date1->diff($date2)->format('%Y, %m, %d'));

$date2->add($interval);

echo $date2->format('m/d/Y g:iA') . PHP_EOL;

$date1->sub($interval);

echo $date1->format('m/d/Y g:iA');