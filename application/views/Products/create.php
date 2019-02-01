<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('products/create'); ?>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name = "name" placeholder="Write Name">
  </div>
  <div class="form-group">
    <label>Discryption</label>
    <textarea class="form-control"name="disc" placeholder="Add Discryption"  id='editor1'></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
    <?php foreach ($categories as $category): ?>
    <option value="<?php echo $category['id']; ?>"><?php echo $category['cat_name']; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="">Upload Image</label>
    <input type="file" name = "prodimage" size = "20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>