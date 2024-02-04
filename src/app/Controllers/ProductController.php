<?php

namespace App\Controllers;

use App\Router;
use App\Models\Product;

class ProductController
{
    public function index(Router $router)
    {
        $search = $_GET['search'] ?? '';
        $product = $router->db->getProducts($search);
        $router->renderView('products/index', [
            'products' => $product,
            'search' => $search
        ]);
    }

    public function create(Router $router)
    {
        $errors = [];

        $productData = [
            'image' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            var_dump($_POST);
            $productData['title'] = $_POST['title'];
            $productData['description'] = $_POST['description'] ?? null;
            $productData['price'] = (float) $_POST['price'];
            $productData['imageFile'] = $_POST['image'] ?? null;

            $product = new Product();
            $product->load($productData);
            $errors = $product->save();

            if(empty($errors)) {
                header('Location: /');
                exit();
            }

            var_dump($productData);

            $router->renderView('products/create', [
                'products' => $productData,
                'errors' => $errors
            ]);



        }

        $router->renderView('products/create', [
            'products' => $productData,
        ]);
    }

    public function update()
    {
        echo "create";
    }

    public function delete()
    {
        echo "delete";
    }
}