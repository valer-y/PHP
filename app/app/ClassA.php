<?php

namespace App;

class ClassA
{
    protected static string $name = 'A';

    public static function getName(): string
    {
        return static::$name;
    }

}