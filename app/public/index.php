<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use App\ClassA;
use App\ClassB;

//$a = new ClassA();
//$b = new ClassB();
//
//echo $a->getName() . PHP_EOL;
//echo $b->getName() . PHP_EOL;

echo ClassA::getName() . PHP_EOL;
echo ClassB::getName() . PHP_EOL;
