<h2><?= $title ?></h2>
<br>
<?php foreach ($products as $product) : ?>
<h3><?php echo $product['name']; ?></h3>
<small class="prod">Posted on: <?php echo $product['created_at']; ?> in <strong><?php echo $product['cat_name']; ?></strong></small> <br>
<?php echo word_limiter($product['disc'], 50); ?>
<br><br>
<p><a class="btn btn-primary" href="<?php echo site_url('/products/'. $product['slug']); ?>">Read More</a></p>
<?php endforeach; ?>
