<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\Container\ContainerException;
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
        if( $this->has($id)) {
            $entry = $this->entries[$id];

            if(is_callable($entry)) {
                return $entry($this);
            }

            $id = $entry;
        }

        return $this->resolve($id);

    }

    public function set(string $id, callable|string $concrete)
    {
        $this->entries[$id] = $concrete;
    }

    /**
     * @throws \ReflectionException
     */
    public function resolve(string $id) {
        // 1. Inspect a class
        $reflectionClass = new \ReflectionClass($id);

        if(! $reflectionClass->isInstantiable()) {
            throw new ContainerException('Class "' . $id . '" is not instantiable');
        }

        // 2. Inspect constructor of the class
        $constructor = $reflectionClass->getConstructor();

        if( ! $constructor) {
            return new $id;
        }

        // 3. Inspect constructor params (dependencies)
        $parameters = $constructor->getParameters();

        if(! $parameters) {
            return new $id;
        }

        // 4. If constructor param is class - resolve dependency using container
        $dependencies = array_map(function (\ReflectionParameter $param) use ($id) {
            $name = $param->getName();
            $type = $param->getType();

            if(! $type) {
                throw new ContainerException(
                    'Failed to resolve class "' . $id. '" because param "' . $name . '" is missing typehint' );
            }

            if($type instanceof \ReflectionUnionType) {
                throw new ContainerException(
                    'Failed to resolve class "' . $id. '" because union type of param "' . $name . '"');
            }

            if($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {
                return $this->get($type->getName());
            }

            throw new ContainerException('Failed to resolve class "' . $id. '" because of invalid param "' . $name );


        }, $parameters);

        return $reflectionClass->newInstanceArgs($dependencies);

    }
}