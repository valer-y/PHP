<?php
$username="root";
$databse="products_crud";
$pass="12345678";
$table = "products";

$search = $_GET['search'] ?? '';


$pdo = new PDO("mysql:host=mysql;dbname={$databse}", $username, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query_select = "SELECT * FROM {$table} ORDER BY create_date DESC";
if($search) {
	$query_select = "SELECT * FROM {$table} WHERE title LIKE :title ORDER BY create_date DESC";
}

$stmt = $pdo->prepare($query_select);

if($search) {
    $stmt->bindValue(':title', "%$search%");
}

$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
<h1>Product list</h1>

<p>
    <a href="create.php" class="btn btn-success">Create Product</a>
</p>

<form>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search for products" name="search" value="<?php echo $_GET['search']; ?>">
        <button class="btn btn-outline-secondary" type="submit">Button</button>
    </div>
</form>


<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Create Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $i => $product) :
      ++$i;
      ?>
        <tr>
            <th scope="row"><?php echo $i;?></th>
            <td>
                <img src="<?php echo $product['image']?>" alt="">
            </td>
            <td><?php echo $product['title']?></td>
            <td><?php echo $product['description']?></td>
            <td><?php echo $product['price']?></td>
            <td><?php echo $product['create_date']?></td>
            <td class="actions-btn">
                <a href="update.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <form id="delete-form" action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>" >
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>