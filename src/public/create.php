<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO('mysql:host=sandbox-db;port=3306;dbname=my_db', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$date = date('Y-m-d H:i:s');

$pdo->prepare("INSERT INTO products (title, image, description, price, create_date) VALUE ('$title', '', '$description', $price, '$date'");



echo "<pre>";
var_dump($_GET);
echo "</pre>";

//phpinfo();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Train CRUD</title>
    <link rel="stylesheet" href="app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<h1>Create new product</h1>

<form action="" method="post">
    <div class="form-group mb-3">
        <label>Product Image</label>
        <br />
        <input type="file" name="image">
    </div>
    <div class="form-group mb-3">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label>Product Description</label>
        <textarea class="form-control" name="descritpion"></textarea>
    </div>
    <div class="form-group mb-3">
        <label>Product Price</label>
        <input type="number" step=".01" class="form-control" name="price">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
