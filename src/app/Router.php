<?php

namespace App;

class Router
{
    public array $getRoutes;
    public array $postRoutes;
    public Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve() {


        $currentUrl = explode('?', $_SERVER['REQUEST_URI'])[0];
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if($fn) {
            call_user_func($fn, $this);
        } else {
            echo "Page not found";
        }
    }

    public function renderView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once dirname(__DIR__) . "/views/$view.php";
        $content = ob_get_clean();
        include_once dirname(__DIR__) . "/views/_layout.php";
    }

}