<?php

require dirname(__DIR__) . "/vendor/autoload.php";

$latte = new \App\LatteMaker();

$latte_clone = clone $latte;

var_dump($latte, $latte_clone);
