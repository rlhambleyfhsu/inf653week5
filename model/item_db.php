<?php
function get_items(){
  global $db;
  $query = 'select ItemNum, Title, Description, CategoryName from todoitems as t left join categories as c on t.categoryID = c.categoryID';
  $statement = $db->prepare($query);
  $statement->execute();
  $items = $statement->fetchAll();
  $statement->closeCursor();
  return $items;
}

function get_items_by_category($category_id) {
  global $db;
  $query = 'select ItemNum, Title, Description, CategoryName from todoitems as t join categories as c on t.categoryID = c.categoryID and c.categoryID =:category_id';
  $statement = $db->prepare($query);
  $statement->bindValue(':category_id', $category_id);
  $statement->execute();
  $items = $statement->fetchAll();
  $statement->closeCursor();
  return $items;
}


function delete_item($item_id){
  global $db;
  $query = 'DELETE FROM todoitems WHERE ItemNum = :ItemNum';
  $statement = $db->prepare($query);
  $statement->bindValue(':ItemNum', $item_id);
  $success = $statement->execute();
  $statement->closeCursor();
}

function add_item($title, $description, $category_id){
  global $db;
  $query = 'INSERT INTO todoitems  (title, description, categoryID) VALUES (:title, :description, :categoryID)';
  $statement = $db->prepare($query);
  $statement->bindValue(':title', $title);
  $statement->bindValue(':description', $description);
  $statement->bindValue(':categoryID', $category_id);
  $statement->execute();
  $statement->closeCursor();
}

 ?>
