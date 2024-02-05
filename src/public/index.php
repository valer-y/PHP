<?php

require_once "../vendor/autoload.php";

use App\Router;
use App\Controllers\ProductController;

$router = new Router();

$router->get('/', [new ProductController(), 'index']);
$router->get('/update', [new ProductController(), 'update']);
$router->post('/update', [new ProductController(), 'update']);
$router->get('/products/create', [new ProductController(), 'create']);
$router->post('/products/create', [new ProductController(), 'create']);

$router->resolve();
