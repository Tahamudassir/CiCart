<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open('/products/update'); ?>
<input type="hidden" name="id" value="<?php echo $product['id']; ?>">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name = "name" placeholder="Add Name" value="<?php echo $product['name']; ?>">
  </div>
  <div class="form-group">
    <label>Discryption</label>
    <textarea class="form-control"name="disc"placeholder="Add Discryption" id='editor1'><?php echo $product['disc']; ?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
    <?php foreach ($categories as $category): ?>
    <option value="<?php echo $category['id']; ?>"><?php echo $category['cat_name']; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>