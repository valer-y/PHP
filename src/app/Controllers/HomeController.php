<?php

declare(strict_types=1);

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        echo '<pre>';
//        var_dump($_REQUEST);
        var_dump($_POST);
        var_dump($_GET);
        echo '</pre>';


        return '<form action="/" method="post"><label>Amount<input type="text" name="amount" id=""></label></form>';
    }
}