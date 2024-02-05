<?php

declare(strict_types=1);

namespace App\Controllers;
use App\View;
use PDO;

class HomeController
{
    public function index() : View
    {
        try {
            $db = new PDO('mysql:host=db;dbname=my_db', 'root', 'root', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            $email = "Nick@doe.com";
            $name = "Nick Doe";
            $isActive = 1;

            $stmt = $db->prepare('INSERT INTO users (email, full_name, is_active, created_at) VALUES (?, ?, ?, NOW())');
            $stmt->execute([$email, $name, $isActive]);

            $id = $db->lastInsertId();

            var_dump($id);

            $user = $db->query("SELECT * FROM users WHERE id = " .$id)->fetchAll(PDO::FETCH_ASSOC);

        } catch (\PDOException $e){
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }

        echo "<pre>";
        var_dump($user);
        echo "</pre>";

        return View::make('index');
    }

    public function upload()
    {
        echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";

        $file_path = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

        move_uploaded_file($_FILES['receipt']['tmp_name'], $file_path);

        header('Location: /');

        echo "<pre>";
        var_dump(pathinfo($file_path));
        echo "</pre>";
    }
}