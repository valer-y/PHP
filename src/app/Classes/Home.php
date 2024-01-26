<?php

declare(strict_types=1);

namespace App\Classes;

class Home
{
    public function index()
    {
        return <<<FORM
<form action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="receipt" id="">
    <button type="submit">Upload</button>    
</form> 
FORM;
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