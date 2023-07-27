<?php

namespace App;

class Router
{
	public array $getRoutes = [];
	public array $postRoutes = [];

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
		echo "<pre>";
		var_dump($_SERVER);
		var_dump($_SERVER['REQUEST_URI']);
		echo "</pre>";
	}
}