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
        return '<form action="/invoces/create" method="post"><label>Amount<input type="text" name="amount" id=""></label></form>';
    }

    public function store()
    {
        $amount = $_POST['amount'];

        var_dump($amount);
    }
}