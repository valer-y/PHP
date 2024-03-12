<?php

namespace App\Services\Shipping;

class Weight
{
    public function __construct(public readonly int $value)
    {
        if ($this->value <= 0 || $this->value > 70) {
            throw new \InvalidArgumentException('Invalid weight');
        };
    }

    public function equalTo(Weight $other) : bool
    {
        return $this->value === $other->value;
    }
}