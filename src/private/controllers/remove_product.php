<?php
  // Get product id from GET parameters
  $product_id = $_GET["product_id"];
  $sql = "DELETE FROM products WHERE product_id=$product_id;";

  // delete the product id
  $result = $conn -> query($sql);
  if (!$result) {
    die("Delete product failed: " . $conn -> error);
  }
  header("LOCATION: index.php?page=products");
?>