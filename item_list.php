<?php include 'view/header.php'; ?>

<main>
  <h1>To Do List</h1>
  <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
<!--        <nav>
        <ul>
            <?php foreach ($categories as $category) : ?>
            <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
            <li>
              <a href=".?category_id=All">All Categories</a>
            </li>
        </ul>
        </nav>
    </aside>-->
    <section>
      <form action="index.php" method="post" id="selectCategory">
        <input type="hidden" name="action" value="get_items">
      <label>Category:</label>
      <select name="category_id">
      <?php foreach ($categories as $category) : ?>
          <option value="<?php echo $category['categoryID']; ?>">
              <?php echo $category['categoryName']; ?>
          </option>
      <?php endforeach; ?>
        <option value="All">All</option>
      </select>
      <input type="submit" value="Select Category"><br>
      </form>
  <!-- display a table of products -->
  <h2><?php echo $category_name; ?></h2>
  <table>
    <tr>
      <td>Item Number</td>
      <td>Title</td>
      <td>Description</td>
      <td>Category</td>
      <td>&nbsp</td>
    </tr>
        <?php foreach ($itemlist as $items) : ?>
        <tr>
        <td><?php if (!empty($items) ) echo $items['ItemNum']; ?></td>
        <td><?php if (!empty($items) ) echo $items['Title']; ?></td>
        <td><?php echo $items['Description']; ?></td>
        <td><?php if (!empty($items) ) echo $items['CategoryName']; ?></td>
        <td><form action="index.php" method="post">
          <input type="hidden" name="action" value="delete_item">
          <input type="hidden" name="item_id" value="<?php echo $items['ItemNum']; ?>">
          <input type="submit" value="Remove">
          </form></td>
        </tr>
        <br>
    <?php  endforeach;  ?>
  </table>
<P>
<p class="last_paragraph">Click here to <a href="?action=show_add_form">add a To Do Item</a></p>
<p><a href="?action=category_list">View/Edit Categories</a></p>
</section>

</main>
<?php include 'view/footer.php'; ?>
