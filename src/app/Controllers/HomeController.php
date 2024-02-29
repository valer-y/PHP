<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Attributes\Get;
use App\Attributes\Post;
use App\Container;
use App\Models\SignUp;
use App\App;
use App\Services\InvoiceService;
use App\View;
use PDO;
use App\Models\User;
use App\Models\Invoice;
use App\Attributes\Route;

/**
 * @mixin PDO
 */

class HomeController
{
    public function __construct(private InvoiceService $invoiceService)
    {
    }

    #[Get(routePath: '/')]
    public function index() : View
    {
      $this->invoiceService->process([], 25);
        return View::make('index');
    }

    #[Post('/', 'post')]
    public function store()
    {

    }

}