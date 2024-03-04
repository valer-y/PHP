<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\PaymentGatewayService;
use App\Services\PaymentGatewayServiceInterface;
use App\Services\SalesTaxService;
use PDO;
use App\Config;

/** @property-read ?array $db */

class App
{

    private static DB $db;
//    public static Container $container;

    public function __construct(
        protected Container $container,
        protected Router $router,
        protected array $request,
        protected Config $config
    )
    {
        static::$db = new DB($config->db ?? []);

        $this->container->set(
            PaymentGatewayServiceInterface::class,
            fn(Container $c) => $c->get(PaymentGatewayService::class)
        );
    }

    public function run()
    {

        try {
            echo $this->router->resolve($this->request['uri'],
                strtolower($this->request['method'])
            );

        } catch (RouteNotFoundException) {
            header('HTTP/1.1 404 Not Found');
            http_response_code(404);
            echo View::make('error/404');
        }

    }

    public static function db() : DB {
        return static::$db;
    }
}