<?php include 'view/header.php'; ?>
<main>
<h1>Add To Do Item</h1>
<form action="index.php" method="post" id="add_item_form">
  <input type="hidden" name="action" value="add_item">
<label>Title:</label>
<input type="text" name="title"><br>
<label>Description:</label>
<input type="text" name="description"><br>
<label>Category:</label>
<select name="categoryID">
<?php foreach ($categories as $category) : ?>
    <option value="<?php echo $category['categoryID']; ?>">
        <?php echo $category['categoryName']; ?>
    </option>
<?php endforeach; ?>
</select><br>

<label>&nbsp;</label>
<input type="submit" value="Add To Do Item"><br>
<p>
  <a href="index.php?action=get_items">View To Do List</a></p>
</form>
</main>
<?php include 'view/footer.php'; ?>
