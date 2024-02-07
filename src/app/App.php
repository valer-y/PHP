<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use PDO;
use App\Config;

/** @property-read ?array $db */

class App
{

    private static DB $db;

    public function __construct(
        protected Router $router,
        protected array $request,
        protected Config $config
    )
    {
        static::$db = new DB($config->db ?? []);
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