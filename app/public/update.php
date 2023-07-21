<?php

/** @var $pdo PDO */
require_once "database.php"; // Db connect
require_once "fuctions.php";

$id = $_GET['id'] ?? null;

if(!$id) {
	header('Location: index.php');
	exit;
}

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);


$errors = [];
$title = $product['title'];
$price = $product['price'];
$description = $product['description'];
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

	if(empty($errors)) {
		$image = $_FILES['image'] ?? null;
		$imagePath = $product['image'];

		if(!is_dir('images')) {
			mkdir('images');
		}

		if($image && $image['tmp_name']) {

            if($product['image']) {
                unlink($product['image']);
            }

			$imagePath = 'images/' . randomString(8) .'/' . $image['name'];
			mkdir(dirname($imagePath));
			move_uploaded_file($image['tmp_name'], $imagePath );
		}

		$query = "UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id";

		$stmt = $pdo->prepare($query);
		$stmt->bindValue(':title', $title);
		$stmt->bindValue(':image', $imagePath);
		$stmt->bindValue(':description', $description);
		$stmt->bindValue(':price', $price);
		$stmt->bindValue(':id', $id);

		$stmt->execute();

		header('Location: index.php');
	}

}?>
<?php include_once 'views/partials/header.php'?>

<p>
    <a href="index.php" class="btn btn-secondary">Go back</a>
</p>

<h1>Update product <?php echo $product['title']?></h1>

<?php include_once "views/products/form.php"?>

</body>
</html>
