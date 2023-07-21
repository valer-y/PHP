<?php

/** @var $pdo PDO */
require_once "database.php"; // Db connect
require_once "fuctions.php";

$errors = [];
$title ='';
$price = '';
$description = '';
$product = [
	'image' => '',
	'title' => ''
];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

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

    $imagePath = '';

    if(empty($errors)) {
        require_once "validate_product.php";

        $query = "INSERT INTO products (title, image, description, price, create_date) 
        VALUES (:title, :image, :description, :price, :date)";

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':image', $imagePath);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':date', $date);

        $stmt->execute();

        header('Location: index.php');
    }

}?>
<?php include_once 'views/partials/header.php'?>

<h1>Create product</h1>

<?php require_once "views/products/form.php"?>

</body>
</html>
