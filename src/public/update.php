<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

require_once "functions.php";

/** @var $pdo PDO */
require_once "database.php";

$id = $_GET['id'];

if(! $id) {
   header('Location: index.php');
   exit;
}

$statement = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$statement->bindValue(':id', $id);
$statement->execute();
$products = $statement->fetch(PDO::FETCH_ASSOC);

$title = $products['title'];
$description = $products['description'];
$price = $products['price'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {


    require_once "validate_product.php";

    $errors = [];

    if(empty($errors)) {

        $imagePath = '';

        require_once "validate_product.php";

        $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");

        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);

        $statement->execute();

        header('Location: index.php');
    }

};

//echo "<pre>";
//var_dump($_GET);
//echo "</pre>";

//phpinfo();
include_once "views/partials/header.php";
?>

<a href="index.php" class="btn btn-secondary">Main page</a>

<h1>Update product</h1>

<?php include_once "views/products/form.php"?>

</body>
</html>
