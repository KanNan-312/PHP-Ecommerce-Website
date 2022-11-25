<!-- Add new product button (only applied for admin role) -->
<?php
  if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin")
  {
    echo '<div class="row">
      <div class="mb-4 col-11 mx-auto d-flex justify-content-end">
        <a href="index.php?page=add_product">
          <button type="button" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add new product
          </button>
        </a>
      </div>
    </div>';
  }
?>
<?php
  // user does not search for anything
  if (!isset($_GET["search"])) {
    // if product type is not specified, show all the products
    if (!isset($_GET["type"])) {
      $sql = "SELECT * from products ORDER BY product_name";
    }
    // product type is specified, show all the products of that type
    else {
      $type = $_GET["type"];
      $sql = "SELECT * from products WHERE category='$type' ORDER BY product_name";
    }
  }
  // user perform search
  else {
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
  }
  $result = $conn -> query($sql); // First parameter is just return of "mysqli_connect()" function
  if ($result -> num_rows == 0) {
    echo "
      <div class='row'>
        <div class='col-11 mx-auto d-flex justify-content-center fs-4'>
          No product found!
        </div>
      </div>
      ";
    exit();
  }
?>

<!-- Start list -->
<div class="row">
  <div class="col-11 mx-auto">
    <!-- List group-->
    <ul class="list-group shadow">
      <!-- list group item. Start php loop here-->
      <?php
        while ($row = $result->fetch_array()) {
          $id = $row["product_id"];
          $name = $row["product_name"];
          $description = $row["description"];
          $price = $row["price"];
          $url = $row["image_url"];

          // cuztomize div based on role
          $edit_remove_div = (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") ?
          "
          <div>
            <button class='border border-0 btn btn-light' onclick='editProduct($id)'>
            <i class='bi bi-pencil-square'></i>
            Edit
            </button>
            <button class='border border-0 btn btn-danger' onclick='removeProduct($id)'>
              <i class='bi bi-trash3'></i>
              Remove
            </button>
          </div>
          " 
          : "";

          $img_div = ($url != "") ? 
          "<img src='$url' alt='Generic placeholder image' width='200' class='ml-lg-5 order-1 order-lg-2'>"
          : "";
          
          // Display product list
          echo "
            <li class='list-group-item'>
            <!-- Custom content-->
            <div class='media align-items-lg-center flex-column flex-lg-row p-3'>
              <div class='media-body order-2 order-lg-1'>
                <div class='d-flex align-items-center justify-content-between mt-1'>
                  <h5 onclick='showProductDetails($id)' class='mt-0 font-weight-bold mb-2 product_card'>$name</h5>
                  $edit_remove_div
                </div>
                <p class='font-italic text-muted mb-0 small'>$description</p>
                <div class='d-flex align-items-center justify-content-between mt-1'>
                  <h6 class='font-weight-bold my-2'>\$$price</h6>
                </div>
              </div> 
              $img_div
            </div> <!-- End -->
          </li> <!-- End -->
          ";
        }

      ?>
    </ul> <!-- End -->
  </div>
</div>