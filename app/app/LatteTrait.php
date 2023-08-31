<?php

namespace App;

trait LatteTrait
{
    public function makeLatte()
    {
        echo static::class . 'is make a Latte' . PHP_EOL;
    }
}