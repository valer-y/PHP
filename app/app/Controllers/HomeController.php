<?php

namespace App\Controllers;

use App\App;
use App\Models\SignUp;
use App\View;
use PDO;
use Predis\Command\Redis\SELECT;
use App\Models\User;
use App\Models\Invoice;

class HomeController
{
    public function index() : View
    {
        $email = 'john@doe.com';
        $name = 'John Doe';
        $amount = 25;

        $invoiceModel  = new Invoice();
        $userModel     = new User();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'emial' => $email,
                'name'  => $name,
            ],
            [
                'amount' => $amount
            ]
        );

        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);

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
