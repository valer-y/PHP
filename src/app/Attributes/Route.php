<?php

namespace App\Attributes;

use App\Interfaces\RouteInterface;
use Attribute;

#[Attribute()]
class Route implements RouteInterface
{

    public function __construct(
        public  string $routePath,
        public string $method = 'get'
    )
    {
    }
}