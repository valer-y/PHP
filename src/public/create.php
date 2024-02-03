<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO('mysql:host=sandbox-db;port=3306;dbname=my_db', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$title = '';
$description = '';
$price = 0.00;
$date = date('Y-m-d H:i:s');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? 0.00;

    $errors = [];

    if(empty($title)) $errors[] = 'Please input the title';
    if(empty($title)) $errors[] = 'Please input the description';
    if(empty($title)) $errors[] = 'Please input the price';

    function randomString($n) {
        $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $str = '';

        for($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $str .= $characters[$index];
        }

        return $str;
    }

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

//echo "<pre>";
//var_dump($_GET);
//echo "</pre>";

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

<?php if(!empty($errors)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error) { ?>
                <div><?php echo $error?></div>
        <?php } ;?>
    </div>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label>Product Image</label>
        <br />
        <input type="file" name="image" >
    </div>
    <div class="form-group mb-3">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
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
