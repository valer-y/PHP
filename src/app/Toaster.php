<?php

namespace App;

class Toaster
{

    public function __construct(
        public array $slices = [],
        public int $size = 2
    )
    {
    }

    public function addSlice(string $slice)
    {
        if(count($this->slices) < $this->size) {
            $this->slices[] = $slice;
        }
    }

    public function toast()
    {
        foreach ($this->slices as $i => $slice)
        {
            echo ($i + 1) . ' : Toasting' . $slice . PHP_EOL;
        }
    }
}