<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Container;
use App\Models\SignUp;
use App\App;
use App\Services\InvoiceService;
use App\View;
use PDO;
use App\Models\User;
use App\Models\Invoice;

/**
 * @mixin PDO
 */

class HomeController
{
    public function __construct(private InvoiceService $invoiceService)
    {
    }

    public function index() : View
    {
//        $email = "dora.l11@doe.com";
//        $name = "Dora Loe11";
//        $amount = 20;
//
//        $userModel = new User();
//        $invoiceModel = new Invoice();
//
//        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
//            [
//                'email' => $email,
//                'name'  => $name,
//            ],
//            [
//                'amount' => $amount
//            ]
//        );

//        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);

      $this->invoiceService->process([], 25);
        return View::make('index');
    }

}