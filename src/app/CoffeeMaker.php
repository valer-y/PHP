<?php

namespace App;

class CoffeeMaker
{
    public function makeCoffe()
    {
        echo static::class . 'is making coffee' . PHP_EOL;
    }
}