<?php

namespace App;

class Router
{
	public array $getRoutes = [];
	public array $postRoutes = [];
	public Database $db;

	public function  __construct() {
		$this->db = new Database();
	}

	public function get($url, $fn)
	{
		$this->getRoutes[$url] = $fn;

		return $this;
	}

	public function post($url, $fn)
	{
		$this->postRoutes[$url] = $fn;

		return $this;
	}

	public function resolve ()
	{
		$currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
		$requestMethod = $_SERVER['REQUEST_METHOD'];

		if ($requestMethod === 'GET') {
			var_dump($_SERVER);
			$fn = $this->getRoutes[$currentUrl] ?? null;
		}

		if ($requestMethod === 'POST') {
			$fn = $this->postRoutes[$currentUrl] ?? null;
		}

		if ($fn) {
			call_user_func($fn, $this);
		} else {
			var_dump($fn);
			echo "Page not found";
		}
	}

	public function renderView($view, $params = [])
	{
		foreach ($params as $key => $value) {
			$$key = $value;
		}

		ob_start();
		include_once __DIR__ . "/views/{$view}.php";
		$content = ob_get_clean();
		include_once __DIR__ . "/views/_layout.php";
	}
}