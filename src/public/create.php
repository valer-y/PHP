<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO('mysql:host=sandbox-db;port=3306;dbname=my_db', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//var_dump($products);

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

<form>
    <div class="form-group mb-3">
        <label>Product Image</label>
        <input type="file" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label>Product Title</label>
        <input type="text" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label>Product Description</label>
        <textarea class="form-control"></textarea>
    </div>
    <div class="form-group mb-3">
        <label>Product Price</label>
        <input type="number" step=".01" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
