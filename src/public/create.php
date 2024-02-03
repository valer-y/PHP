<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

/** @var $pdo PDO */
require_once "database.php";

require_once "functions.php";

$title = '';
$description = '';
$price = 0.00;
$date = date('Y-m-d H:i:s');
$products = [
        'image' => ''
];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(empty($errors)) {

        $imagePath = '';

        require_once "validate_product.php";

        $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date) VALUES (:title, :image, :description, :price, :date)");

        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);

        $statement->execute();

        header('Location: index.php');
    }

};

include_once "views/partials/header.php";
?>
<h1>Create new product</h1>

<a href="index.php" class="btn btn-secondary">Main page</a>

<?php include_once "views/products/form.php"?>

</body>
</html>
