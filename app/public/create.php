<?php
$username="root";
$databse="products_crud";
$pass="12345678";
$table = "products";

$pdo = new PDO("mysql:host=mysql;dbname={$databse}", $username, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];

$title = '';
$description = '';
$price = '';

if($_SERVER['REQUEST_METHOD'] === "POST") {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$date = date('Y-m-d H:i:s');

	if(!$title) {
        $errors[] = "Product title is required";
	}

	if(!$price) {
		$errors[] = "Product price is required";
	}

    if(!is_dir('images')) {
        mkdir('images');
    }


    if(empty($errors)) {
        $image = $_FILES['image'] ?? '';
        $imagePath = '';

        if($image && $image['tmp_name']) {
            $imagePath = 'images/'.randomString(8).'/'.$image['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $query_create = "INSERT INTO {$table} (title, image, description, price, create_date) 
        VALUES (:title, :image, :description, :price, :date)";

        $stmt = $pdo->prepare($query_create);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':image', $imagePath);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':date', $date);

        $stmt->execute();
        header('Location: index.php');
    }
}

function randomString($n) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$str = '';
	for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
	}
	return $str;
}

?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>CRUD</title>
</head>
<body>
<h1>Create New product</h1>

<?php if(!empty($errors)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error) :?>
            <div><?php echo $error ?></div>
        <?php endforeach;?>
    </div>
<?php endif;?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Product Image</label>
        <br>
        <input type="file" name="image">
    </div>
    <div class="mb-3">
        <label>Product Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $title;?>">
    </div>
    <div class="mb-3">
        <label>Product Description</label>
        <textarea class="form-control" name="description" value="<?php echo $description;?>"></textarea>
    </div>
    <div class="mb-3">
        <label>Product Price</label>
        <input type="number" step=".01" class="form-control" name="price" value="<?php echo $price;?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>