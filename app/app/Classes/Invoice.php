<?php

namespace App\Classes;

class Invoice
{
    public function index() : string
    {
        return 'Invoicse';
    }

    public function create() : string
    {
        return '<form action="/invoices/create" method="post"><label for="">Amount</label><input type="text" name="amount"></form>';
    }

    public function store() {
        $amount = $_POST['amount'];

        var_dump($amount);
    }
}