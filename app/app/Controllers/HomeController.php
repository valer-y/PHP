<?php

namespace App\Controllers;

use App\View;

class HomeController
{
    public function index() : string
    {
        return (new View('index'))->render();
    }

    public function upload()
    {
//        var_dump($_FILES);
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);
    }
}