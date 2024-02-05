<h1>Create Page</h1>


<?php if(!empty($errors)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error) { ?>
            <div><?php echo $error?></div>
        <?php } ;?>
    </div>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">

    <?php if($products['image']) : ?>
        <img src="<?php echo $products['image']?>" class="update-image">
    <?php endif; ?>

    <div class="form-group mb-3">
        <label>Product Image</label>
        <br />
        <input type="file" name="image" >
    </div>
    <div class="form-group mb-3">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $products['title'] ?>">
    </div>
    <div class="form-group mb-3">
        <label>Product Description</label>
        <textarea class="form-control" name="descritpion"><?php echo $products['description'] ?></textarea>
    </div>
    <div class="form-group mb-3">
        <label>Product Price</label>
        <input type="number" step=".01" class="form-control" name="price" value="<?php echo $products['price'] ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>