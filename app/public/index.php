<?php


use App\App;
use \App\Controllers\HomeController;
use \App\Controllers\InvoiceController;
use App\Config;

require_once dirname(__DIR__) . "/vendor/autoload.php";

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', dirname(__DIR__) . '/storage');
define('VIEW_PATH', dirname(__DIR__) . '/views/');

$router = new \App\Router();


$router
    ->get('/', [HomeController::class, 'index'])
    ->get('/download', [HomeController::class, 'download'])
    ->post('/upload', [HomeController::class, 'upload'])
    ->get('/invoices', [InvoiceController::class, 'index'])
    ->get('/invoices/create', [InvoiceController::class, 'create'])
    ->post('/invoices/create', [InvoiceController::class, 'store']);


(new App($router, [
    'uri'    => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD']
],
    new Config($_ENV)
))->run();