<?php

namespace App;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);
//        var_dump($journals);

        include "Views/$view.php";
    }
}