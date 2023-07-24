<?php

require_once "../vendor/autoload.php";

use App\Router;
use App\controllers\ProductController;

$router = new Router();

$router->get('/', [ProductController::class, 'index']);
$router->get('/products/create', [ProductController::class, 'create']);
$router->post('/products/create', [ProductController::class, 'create']);
$router->get('/products/update', [ProductController::class, 'update']);
$router->post('/products/update', [ProductController::class, 'update']);
$router->post('/products/delete', [ProductController::class, 'delete']);
$router->get('/products', [ProductController::class, 'index']);

$router->resolve();

//$n = new ProductController();
//$n->create();