<?php
require('model/database.php');
require('model/item_db.php');
require('model/category_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL) {
    $action = 'get_items';
  }
}
if ($action == 'get_items') {
  $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
  if (isset($_POST['category_id'])){
      $category_id = $_POST['category_id'];
      }
  if ($category_id == NULL || $category_id == FALSE || $category_id == 'All' ) {
    $itemlist = get_items();
    $category_name = 'All';
  }
  else {
    $category_name = get_category_name($category_id);
    $itemlist = get_items_by_category($category_id);
  }
  $categories = get_categories();
  include('item_list.php');
}
else if ($action == 'delete_item') {
  $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
  if ( $item_id == NULL || $item_id == FALSE) {
    $error = "Missing or incorrect product id or category id.";
    include('errors/error.php');
  }
  else {
    delete_item($item_id);
    header("Location: .?category_id=$category_id");
  }
}
else if ($action == 'show_add_form') {
  $categories = get_categories();
  include('add_item_form.php');
}
else if ($action == 'add_item') {
  $category_id = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
  $title = filter_input(INPUT_POST, 'title');
  $description = filter_input(INPUT_POST, 'description');
  if ($category_id == NULL || $category_id == FALSE || $title == NULL || $title == False || $description == NULL || $description == FALSE) {
    $error = "Invalid item data. Check all fields and try again.";
    include('errors/error.php');
  }
  else {
    add_item ($title, $description,$category_id);
    header("Location: .?category_id=$category_id");
  }
 }
 else if ($action == 'category_list'){
   $categories = get_categories();
   include('category_list.php');
 }
 else if ($action == 'add_category'){
   $categoryName = filter_input(INPUT_POST, 'categoryName');
   if ($categoryName == NULL || $categoryName == FALSE ) {
     $error = "Invalid item data. Check all fields and try again.";
     include('errors/error.php');
   }
   else {
     add_category ($categoryName);
     header("Location: .?action=get_items");
   }
 }
 else if ($action == 'delete_category'){
   $category_id = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
   if ($category_id == NULL || $category_id == FALSE ) {
     $error = "Invalid item data. Check all fields and try again.";
     include('errors/error.php');
   }
   else {
     delete_category ($category_id);
     header("Location: .?action=get_items");
   }
 }
?>
