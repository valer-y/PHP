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
            $db = new PDO('mysql:host=db;dbname=my_db', 'root', 'root');
        } catch (\PDOException $e){
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }

        $email = "jack@doe.com";
        $name = "Jack Doe";
        $amount = 20;

        $newUserStmt = $db->prepare('
                INSERT INTO users (email, full_name, is_active, created_at) 
                VALUES (?, ?, 1, NOW())');
        $newInvoiceStmt = $db->prepare(
            'INSERT INTO invoices (amount, user_id) VALUES (?, ?)'
        );

        $newUserStmt->execute([$email, $name]);

        $userId = (int) $db->lastInsertId();

        $newInvoiceStmt->execute([$amount, $userId]);

        $fetchStmt = $db->prepare(
            'SELECT invoices.id AS invoice_id, amount, user_id, full_name
            FROM invoices
            INNER JOIN users ON user_id = users.id
            WHERE email = ?'
        );

        $fetchStmt->execute([$email]);

        echo "<pre>";
        var_dump($fetchStmt->fetch(PDO::FETCH_ASSOC));
        echo "</pre>";

        return View::make('index', ['foo' => 'bar']);
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