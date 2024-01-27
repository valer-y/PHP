<?php

declare(strict_types=1);

namespace App\Controllers;
use App\View;

class HomeController
{
    public function index() : View
    {
        return View::make('index', ['foo' => 'bar']);
    }

    public function upload()
    {
        echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";

        $file_path = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

        move_uploaded_file($_FILES['receipt']['tmp_name'], $file_path);

        echo "<pre>";
        var_dump(pathinfo($file_path));
        echo "</pre>";
    }
}