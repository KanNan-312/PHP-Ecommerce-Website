<?php
  $product_id = $_GET["product_id"];
  // Receive values from POST request
  $product_name = $_POST["product_name"];
  $category = $_POST["category"];
  $price = $_POST["price"];
  $description = $_POST["description"];
  $url = $_POST["url"];

  $sql =
    "UPDATE products 
    SET 
      product_name='$product_name',
      description='$description',
      category='$category',
      price = $price,
      image_url='$url'
    WHERE
      product_id=$product_id;";

  $result = $conn -> query($sql);
  if (!$result) {
    die("Update product failed: " . $conn -> error);
  }
  
  header("LOCATION: index.php?page=products");
?>