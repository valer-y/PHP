<?php

    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? 0.00;

    $errors = [];

    if(empty($title)) $errors[] = 'Please input the title';
    if(empty($title)) $errors[] = 'Please input the description';
    if(empty($title)) $errors[] = 'Please input the price';

    if(! is_dir('images')) {
        mkdir('images');
    }

    if(empty($errors)) {
        $image = $_FILES['image'] ?? null;
        $imagePath = '';

        if($image && $image['tmp_name']) {

            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
            mkdir(dirname($imagePath));

            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        header('Location: index.php');
    }
