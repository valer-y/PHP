<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');

var_dump(STORAGE_PATH);

$router = new \App\Router();

$router
    ->get('/', [App\Classes\Home::class, 'index'])
    ->post('/upload', [App\Classes\Home::class, 'upload'])
    ->get('/invoices', [App\Classes\Invoices::class, 'index'])
    ->get('/invoices/create', [App\Classes\Invoices::class, 'create'])
    ->post('/invoices/create', [App\Classes\Invoices::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

