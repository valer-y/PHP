<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use App\Router;
use App\controllers\ProductController;

$router = new Router();

$router->get('/', [ProductController::class, 'index'])
	->get('/products', [ProductController::class, 'index'])
	->get('/products/create', [ProductController::class, 'create'])
	->post('/products/create', [ProductController::class, 'create'])
	->get('/products/update', [ProductController::class, 'update'])
	->post('/products/update', [ProductController::class, 'update'])
	->post('/products/delete', [ProductController::class, 'delete']);

$router->resolve();
