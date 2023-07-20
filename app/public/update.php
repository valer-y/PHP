<?php

$host   = 'mysql';
$user   = 'root';
$pwd 	= '12345678';
$dbName = 'products_crud';

$dsn = "mysql:host=$host;port=3306;dbname=$dbName";

$pdo = new PDO($dsn, $user, $pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

if($_SERVER['REQUEST_METHOD'] === 'POST') {

	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$date = date('Y-m-d H:i:s');

	function randomString($n) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$str = '';

		for($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$str .= $characters[$index];
		}

		return $str;
	}

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

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<p>
    <a href="index.php" class="btn btn-secondary">Go back</a>
</p>

<h1>Update product <?php echo $product['title']?></h1>

<?php //var_dump($product); exit;?>

<?php if(!empty($errors)) : ?>
	<div class="alert alert-danger">
		<?php foreach ($errors as $error) : ?>
			<div><?php echo $error?></div>
		<?php endforeach;?>
	</div>
<?php endif; ?>

<form action="" method="POST" enctype="multipart/form-data">
    <?php if($product['image']) : ?>
        <img src="<?php echo $product['image']?>" class="update-image">
    <?php endif; ?>

	<div class="form-group">
		<label>Product Image</label>
		<input type="file" name="image">
		<br /><br />
	</div>
	<div class="form-group">
		<label>Product Title</label>
		<br />
		<input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
		<br />
	</div>
	<div class="form-group">
		<label>Product Description</label>
		<input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
		<br />
	</div>
	<div class="form-group">
		<label>Product Price</label>
		<input type="text" step=".01" class="form-control" name="price" value="<?php echo $price; ?>">
		<br />
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
