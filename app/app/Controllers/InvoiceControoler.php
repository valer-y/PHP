<?php

namespace App\Controllers;

class InvoiceController
{
    public function index() : string
    {
        return 'Invoicse';
    }

    public function create() : string
    {
        return '';
    }

    public function store() {
        $amount = $_POST['amount'];

        var_dump($amount);
    }
}