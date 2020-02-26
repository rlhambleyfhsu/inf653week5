<?php include 'view/header.php'; ?>
<main>
  <h1>To Do List Categories</h1>
  <section>
    <!-- display a table of categories -->
    <table>
      <tr>
        <td>Category ID</td>
        <td>Category Name</td>
        <td>&nbsp</td>
      </tr>
          <?php foreach ($categories as $categories) : ?>
          <?php if (!empty($categories) ) { ?>
          <tr>
          <td><?php echo $categories['categoryID']; ?></td>
          <td><?php echo $categories['categoryName']; ?></td>
          <td><form action="index.php" method="post">
            <input type="hidden" name="action" value="delete_category">
            <input type="hidden" name="categoryID" value="<?php echo $categories['categoryID']; ?>">
            <input type="submit" value="Remove">
            </form></td>
          </tr>
          <br>
      <?php } endforeach; ?>
    </table>
    <P>
    <h1>Add Category</h1>
    <form action="index.php" method="post" id="add_category_form">
      <input type="hidden" name="action" value="add_category">
    <label>Title:</label>
    <input type="text" name="categoryName"><br>
    <label>&nbsp;</label>
    <input type="submit" value="Add Category"><br>
    <p>
      <a href="index.php?action=get_items">View To Do List</a></p>
    </form>
  </section>
  <P>

  <p><a href="index.php">Return to the To Do List</a></p>
</main>

<?php include 'view/footer.php'; ?>
