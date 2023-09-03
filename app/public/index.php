<?php


require_once dirname(__DIR__) . "/vendor/autoload.php";

session_start();

define('STORAGE_PATH', dirname(__DIR__) . '/storage');
define('VIEW_PATH', dirname(__DIR__) . '/views/');

$router = new \App\Router();

try {

    $router
        ->get('/', [\App\Controllers\HomeController::class, 'index'])
        ->get('/download', [\App\Controllers\HomeController::class, 'download'])
        ->post('/upload', [\App\Controllers\HomeController::class, 'upload'])
        ->get('/invoices', [\App\Controllers\InvoiceController::class, 'index'])
        ->get('/invoices/create', [\App\Controllers\InvoiceController::class, 'create'])
        ->post('/invoices/create', [\App\Controllers\InvoiceController::class, 'store']);

    echo $router->resolve(
        $_SERVER['REQUEST_URI'],
        strtolower($_SERVER['REQUEST_METHOD'])
    );

} catch (\App\Exception\RouteNotFoundException $e) {
    header('HTTP/1.1 404 Not Found');
    http_response_code(404);

    echo \App\View::make('error/404');
}
