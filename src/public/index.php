<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$router = new \App\Router();

$router
    ->register('/', [App\Classes\Home::class, 'index'])
    ->register('/invoices', [App\Classes\Invoices::class, 'index'])
    ->register('/invoices/create', [App\Classes\Invoices::class, 'create']);

$router->resolve($_SERVER['REQUEST_URI']);