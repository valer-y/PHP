<?php

declare(strict_types = 1);

use App\App;
use App\Controllers\CurlController;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Router;
use Illuminate\Container\Container;

require_once __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

//$app->get('/', function (Request $request, Response $response, $args) {
////    $response->getBody()->write("Hello world!");
//    $view = Twig::fromRequest($request);
//    return $view->render($response, 'index.twig');
//
//});

$app->get('/', [HomeController::class, 'index']);

// Create Twig
$twig = Twig::create(VIEW_PATH, [
    'cache' => STORAGE_PATH . '/cache',
    'auto_reload' => true
]);

$twig->addExtension(new \Twig\Extra\Intl\IntlExtension());
// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $twig));

$app->run();