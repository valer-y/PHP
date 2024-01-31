<?php

namespace App\Models;

class Journals
{
    public $name;
    public $publishedYear;

    public function __construct($name, $publishedYear)
    {
        $this->name = $name;
        $this->publishedYear = $publishedYear;
    }
}