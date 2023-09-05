<?php

namespace App\Controllers;

use App\View;
use PDO;

class HomeController
{
    public function index() : View
    {
        try {
            $db = new PDO('mysql:host=db;dbname=my_db', 'root', 'root');

            $query = 'SELECT * FROM users';

            foreach ($db->query($query)->fetchAll(PDO::FETCH_OBJ) as $user) {
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            };

//            var_dump($stmt->fetchAll());

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }

        var_dump($db);

        return View::make('index', ['header' => 'bar']);
    }

    public function download()
    {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="myfile.pdf"');

        readfile(STORAGE_PATH . '/receipt 6-20-2021.pdf');
    }



    public function upload()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');
    }
}
