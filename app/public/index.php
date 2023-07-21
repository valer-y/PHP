<?php

require_once "../vendor/autoload.php"; ?>

<?php

/** @var $pdo PDO */
require_once "database.php"; // Db connect

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

<?php include_once 'views/partials/header.php'?>
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
