<?php
  $search_key = $_GET["search"];
  // product type not specified
  if (!isset($_GET["type"])) {
    $sql = "SELECT * from products WHERE product_name LIKE '$search_key%' ORDER BY product_name";
  }
  // product type specified
  else {
    $type = $_GET["type"];
    $sql = "SELECT * from products WHERE category='$type' AND product_name LIKE '$search_key%' ORDER BY product_name";
  }
  $result = $conn -> query($sql); // First parameter is just return of "mysqli_connect()" function
  
  $hints = [];
  while ($row = $result -> fetch_assoc()) {
    $hints[] = $row["product_name"];
  }

  if (count($hints) == 0) {
    echo "";
    exit();
  }
?>
<ul class="mb-1 pt-2 px-0">
  <?php
    foreach ($hints as $hint) {
      echo "<li class='dropdown-item dropdown_text grey-on-hover ps-3 py-1' onclick='hintClicked(\"$hint\")'> $hint </li>";
    }
  ?>
</ul>