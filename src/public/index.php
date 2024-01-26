<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new \App\Router();

$router
    ->get('/', [App\Controllers\HomeController::class, 'index'])
    ->get('/invoices', [App\Controllers\InvoicesController::class, 'index'])
    ->get('/invoices/create', [App\Controllers\InvoicesController::class, 'create'])
    ->post('/invoices/create', [App\Controllers\InvoicesController::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

