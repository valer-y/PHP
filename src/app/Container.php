<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\Container\NotFoundException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{

    private array $entries = [];

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function get(string $id)
    {
        if( ! $this->has($id)) {
            throw new NotFoundException('Class "' . $id . '" has no bindings"');
        }

        $entry = $this->entries[$id];

        return $entry($this);
    }

    public function set(string $id, callable $concrete)
    {
        $this->entries[$id] = $concrete;
    }
}