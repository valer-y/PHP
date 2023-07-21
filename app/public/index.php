<?php

require_once "../vendor/autoload.php"; ?>

<?php

$host   = 'mysql';
$user   = 'root';
$pwd 	= '12345678';
$dbName = 'products_crud';

$dsn = "mysql:host=$host;port=3306;dbname=$dbName";

$pdo = new PDO($dsn, $user, $pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search'] ?? '';

$query = "SELECT * FROM products ORDER BY create_date DESC";
$query_search = "SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC";



var_dump($search);
if($search) {
	$stmt = $pdo->prepare($query_search);
    $stmt->bindValue(':title', "%$search%");
} else {
	$stmt = $pdo->prepare($query);
}

$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

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
    <h1>Products CRUD demo</h1>

    <p>
        <a href="create.php" class="btn btn-success">Create Product</a>
    </p>

    <form action="/">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search products" name="search" value="<?php echo $search ?>" >
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Button</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Create</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

            <?php foreach ($products as $i => $product) : ?>
                <tr>
                    <th scope="row"><?php echo ++$i; ?></th>
                    <td>
                        <img src="<?php echo $product['image']; ?>" class="img">
                    </td>
                    <td><?php echo $product['title']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['create_date']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $product['id']?>" type="button" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form class="action-btn" action="delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $product['id']?>" >
                            <button href="delete.php?id=<?php echo $product['id']; ?>" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</body>
</html>
