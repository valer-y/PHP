<?php

namespace App\Classes;

class Invoices
{
    public function index(): string
    {
        return 'Home';
    }

    public function create() : string
    {
        return 'Invoice created';
    }
}