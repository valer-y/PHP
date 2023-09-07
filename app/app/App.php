<?php

namespace App;

use App\Exception\RouteNotFoundException;
use PDO;


/**
 * @mixin PDO
 */
class App
{
    private static DB $db;

    public function __construct(protected Router $router, protected array $request, protected Config $config)
    {
        static::$db = new DB($config->db ?? []);
    }

    public function run() {

        try {
            echo $this->router->resolve(
                $this->request['uri'],
                strtolower($this->request['method'])
            );
        } catch (RouteNotFoundException) {
            http_response_code(404);

            echo View::make('error/404');
        }

    }

    public static function db(): DB
    {
        return static::$db;
    }
}