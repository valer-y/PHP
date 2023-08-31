<?php

namespace App\Classes;

class Home
{
    public function index() : string
    {
        return <<<FORM
    <form action="/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="receipt" />
        <button type="submit">Submit</button>
    </form>  
FORM;
    }

    public function upload()
    {
//        var_dump($_FILES);
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);
    }
}
