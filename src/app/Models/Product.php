<?php

namespace App\Models;

class Product
{
    public ?int $id = null;
    public ?string $title = null;
    public ?string $imagePath = null;
    public ?string $imageFile = null;
    public ?string $description = null;
    public ?float $price = null;

    public function load($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->imageFile = $data['imageFile'];
        $this->imagePath = $data['image'] ?? null;
    }

    public function save()
    {
        $errors = [];

        if ( empty($this->title)) {
            $errors[] = 'Product title is required';
        }

        if ( empty($this->price)) {
            $errors[] = 'Product price is required';
        }

//        var_dump($errors);


        if(! is_dir('images')) {
            mkdir('images');
        }

        if(empty($errors)) {
            $imagePath = $_FILES['image'] ?? null;
            $imagePath = '';

            if($this->imageFile && $this->imageFile['tmp_name']) {

                $imagePath = 'images/' . randomString(8) . '/' . $this->imageFile['name'];
                mkdir(dirname($imagePath));

                move_uploaded_file($this->imageFile['tmp_name'], $this->imagePath);
            }

        }

        return $errors;
    }
}