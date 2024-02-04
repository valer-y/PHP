<h1>Train CRUD</h1>

<p>
    <a href="products/create" class="btn btn-success">Create Product</a>
</p>

<form action="/">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username" name="search" value="<?php echo $search; ?>">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
    </div>
</form>


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
    <?php foreach (/** @var */$products as $i => $elem) :?>
        <tr>
            <th scope="row"><?php echo ++$i; ?></th>
            <td>
                <img src="<?php echo $elem['image']; ?>">
            </td>
            <td><?php echo $elem['title']; ?></td>
            <td><?php echo $elem['price']; ?></td>
            <td><?php echo $elem['create_date']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $elem['id']; ?>" type="button" class="btn btn-sm btn-outline-primary">Edit</a>
                <form style="display: inline-block" action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $elem['id']; ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>

            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>