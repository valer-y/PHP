<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
class Get extends Route
{
    public function __construct(string $routePath)
    {
        parent::__construct($routePath, 'get');

    }
}