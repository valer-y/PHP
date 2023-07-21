<?php
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$date = date('Y-m-d H:i:s');


if(!$title) {
	$errors[] = "Product title is required";
}

if(!$price) {
	$errors[] = "Products price is required";
}

if(empty($errors)) {
	$image = $_FILES['image'] ?? null;
	$imagePath = '';

	if (!is_dir('images')) {
		mkdir('images');
	}

	if ($image && $image['tmp_name']) {

		$imagePath = 'images/' . randomString(8) . '/' . $image['name'];
		mkdir(dirname($imagePath));
		move_uploaded_file($image['tmp_name'], $imagePath);
	}
}