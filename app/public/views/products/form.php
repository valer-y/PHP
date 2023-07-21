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
