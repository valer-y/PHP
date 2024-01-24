<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new \App\Router();

$router
    ->get('/', [App\Classes\Home::class, 'index'])
    ->get('/invoices', [App\Classes\Invoices::class, 'index'])
    ->get('/invoices/create', [App\Classes\Invoices::class, 'create'])
    ->post('/invoices/create', [App\Classes\Invoices::class, 'create']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

