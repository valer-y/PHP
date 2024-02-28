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
      $this->invoiceService->process([], 25);
        return View::make('index');
    }

}