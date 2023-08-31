<?php

namespace App;

class LatteMaker
{
    use LatteTrait;
    use CapucchinoTrait {
        CapucchinoTrait::makeCapucchino as public;
    }
}