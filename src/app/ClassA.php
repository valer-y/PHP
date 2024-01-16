<?php

namespace App;

class ClassA
{
    protected static string $name = 'A';

    public static function getName() : string
    {
        var_dump(self::$name);
        return self::$name;
    }
}