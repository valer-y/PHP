<?php

namespace App\Classes;

class Invoices
{

    public function create() : string
    {
        echo '<pre>';
//        var_dump($_REQUEST);
        var_dump($_POST);
        var_dump($_GET);
        echo '</pre>';

        return '<form action="/invoices/create" method="post"><label>Amount<input type="text" name="amount" id=""></label></form>';
    }

    public function store()
    {
        $amount = $_POST['amount'];

        var_dump($amount);
    }
}