<?php

declare(strict_types=1);

namespace App;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{

    private $entries = [];



    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function get(string $id)
    {
        if( ! $this->has($id)) {
            return '';
        }
    }

    public function set(string $id, callable $concrete)
    {
        $this->entries[$id] = $concrete;
    }
}