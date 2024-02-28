<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');


use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Config;
use App\App;

$container = new \App\Container();
$router = new \App\Router($container);

$router
    ->get('/', [HomeController::class, 'index'])
    ->get('/invoices', [InvoicesController::class, 'index'])
    ->get('/invoices/create', [InvoicesController::class, 'create'])
    ->post('/invoices/create', [InvoicesController::class, 'store']);


(new App($container, $router,
    [
      'uri' => $_SERVER['REQUEST_URI'],
      'method' => $_SERVER['REQUEST_METHOD']
    ], new Config($_ENV)
)
)->run();