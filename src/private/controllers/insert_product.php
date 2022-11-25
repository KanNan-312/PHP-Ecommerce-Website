<?php
  // Find the highest current product id
  $sql = "SELECT MAX(product_id) as max_id FROM products";
  $result = $conn -> query($sql);
  $row = $result -> fetch_assoc();
  // set id to 1 if there is no product id yet.
  if(!$row)
    $product_id = 1;
  else
    $product_id = $row["max_id"] + 1;

  // Receive values from POST request
  $product_name = $_POST["product_name"];
  $category = $_POST["category"];
  $price = $_POST["price"];
  $description = $_POST["description"];
  $url = $_POST["url"];

  $sql = "INSERT INTO products(product_id, product_name, category, price, description, image_url ) VALUES
  ($product_id, '$product_name', '$category', $price, '$description', '$url');";

  $result = $conn -> query($sql);
  if (!$result) {
    die("Insert product failed: " . $conn -> error);
  }
  
  header("LOCATION: index.php?page=products");
?>