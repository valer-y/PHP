<?php

namespace App\controllers;

use App\Router;

class ProductController
{
	public static function index(Router $router)
	{
		$router->renderView('products/index');
	}

	public static function create()
	{
		echo "Create";
	}

	public static function update()
	{
		echo "Update";
	}

	public static function delete()
	{
		echo "Delete";
	}

}