<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO('mysql:host=sandbox-db;port=3306;dbname=my_db', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = 'SELECT * FROM products ORDER BY create_date DESC';

$statement = $pdo->prepare($query);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump($products);

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
<h1>Train CRUD</h1>

<p>
    <a href="create.php" class="btn btn-success">Create Product</a>
</p>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Create Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $i => $elem) :?>
        <tr>
            <th scope="row"><?php echo ++$i; ?></th>
            <td>
                <img src="<?php echo $elem['image']; ?>">
            </td>
            <td><?php echo $elem['title']; ?></td>
            <td><?php echo $elem['price']; ?></td>
            <td><?php echo $elem['create_date']; ?></td>
            <td>
                <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                <form style="display: inline-block" action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $elem['id']; ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>

            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>
