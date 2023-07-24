<?php

namespace App;

class Router
{
	public array $getRoutes = [];
	public array $postRoutes = [];

	public function get($url, $fn)
	{
		$this->getRoutes[$url] = $fn;
	}

	public function post($url, $fn)
	{
		$this->postRoutes[$url] = $fn;
	}

	public function resolve()
	{
		$currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
		$method = $_SERVER['REQUEST_METHOD'];

		if ($method === 'GET') {
			$fn = $this->getRoutes[$currentUrl] ?? null;
		} else {
			$fn = $this->postRoutes[$currentUrl] ?? null;
		}

		if ($fn) {

			call_user_func($fn, $this);
//			echo "<pre>";
//			var_dump($fn);
//			echo "</pre>";
//			echo "<br><br>";
//			var_dump($_SERVER);
		} else {
			echo "Page not found";
		}

	}


	public function renderView($view)
	{
		include_once __DIR__ . "/views/{$view}.php";
	}
}