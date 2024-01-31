<h1>Hi</h1>

<ul>
    <?php /** @var \App\Models\Journals $journals */
    foreach ($journals as $item) : ?>
        <li><?php echo $item->name; ?></li>
    <?php endforeach; ?>
</ul>