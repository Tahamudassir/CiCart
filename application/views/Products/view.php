<h2><?php echo $product['name']; ?></h2>
<small class="prod">Posted on: <?php echo $product['created_at']; ?></small> <br>
<div class="prod-body">
  <?php echo $product['disc'] ?>
</div>
<hr>
<a class="btn btn-primary pull-left " href="edit/<?php echo $product['slug']; ?>">Edit</a>
<?php echo form_open('/products/delete/'.$product['id']); ?>
<input type="submit" class="btn btn-danger" value="Delete">
</form>