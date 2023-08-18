<?php

require dirname(__DIR__) . "/vendor/autoload.php";

$obj = new class(2) {
    public function __construct(public int $x)
    {
    }
};

var_dump($obj);
