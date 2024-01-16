<?php

namespace App;

trait LatteTrait
{
    public string $milkType = 'whole-milk';

    public function makeLatte()
    {
        echo static::class . ' is making latte ' . $this->milkType . PHP_EOL;
    }

    public function setMilkType(string $milk) : static
    {
        $this->milkType = $milk;

        return $this;
    }
}