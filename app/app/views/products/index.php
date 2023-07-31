<h1>Product List</h1>

<p>
    <a href="create.php" class="btn btn-success">Create Product</a>
</p>

<form action="">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search for products" name="search" value="<?php echo $search; ?>">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
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