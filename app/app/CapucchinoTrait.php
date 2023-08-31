<?php

namespace App;

trait CapucchinoTrait
{
    protected string $milk  = 'whole-milk';

    /**
     * Some description
     *
     * @throws
     *
     * @param
     *
     * @return void
     */
    private function makeCapucchino()
    {
        echo static::class . 'is make a Capuchino ' . $this->milk . PHP_EOL;
    }
}