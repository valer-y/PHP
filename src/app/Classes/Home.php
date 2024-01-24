<?php

declare(strict_types=1);

namespace App\Classes;

class Home
{
    public function index()
    {
        echo '<pre>';
        var_dump($_REQUEST);
        var_dump($_POST);
        var_dump($_GET);
        echo '</pre>';


        return '<form action="/" method="get"><label>Amount<input type="text" name="amount" id=""></label></form>';
    }
}