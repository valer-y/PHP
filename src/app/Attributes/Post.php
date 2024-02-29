<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
class Post extends Route
{
    public function __construct(string $routePath)
    {
        parent::__construct($routePath, 'post');

    }
}