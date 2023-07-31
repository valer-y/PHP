<?php

namespace App\controllers;

use App\Router;

class ProductController
{
	public static function index(Router $router)
	{
		$search = $_GET['search'] ?? '';
		$products = $router->db->getProducts();
		$router->renderView('products/index', [
			'products' => $products,
			'search' => $search
		]);
	}

	public static function create()
	{
		echo "Create";
	}

	public static function update()
	{
		echo "Create";
	}

	public static function delete()
	{
		echo "Create";
	}
}