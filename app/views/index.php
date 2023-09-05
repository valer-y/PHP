<h1><?php echo $header; ?></h1>

<form action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="receipt" />
    <button type="submit">Submit</button>
</form>