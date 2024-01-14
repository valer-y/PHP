<?php

namespace App;

class FancyOven
{
    public function __construct(
        private ToasterPro $toaster
    )
    {
    }

    public function addSlice() {
        $this->toaster->addSlice();
    }

    public function toast()
    {
        $this->toaster->toast();
    }
}