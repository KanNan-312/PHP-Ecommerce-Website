<?php
  $id = $_GET["product_id"];
  $sql = "SELECT * from products WHERE product_id = '$id'";
  $result = $conn -> query($sql); // First parameter is just return of "mysqli_connect()" function
  // Get product information
  $product = $result -> fetch_assoc();
  $name = $product["product_name"];
  $description = $product["description"];
  $price = $product["price"];
  $url = $product["image_url"];
  // Placeholder image
  if ($url == "")
    $url = "https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930";
?>

<!-- View details -->
<div class="row">
  <div class="col-11 mx-auto">
    <?php
      
      // Display product list
      echo "
        <!-- Custom content-->
        <div class='align-items-start d-flex flex-row p-3 justify-content-center'>
          <!-- Product image -->
          <div>
            <img src='$url' alt='Generic placeholder image' width='200'>
          </div>

          <!-- Product details -->
          <div class='flex-grow-1 ms-4'>
            <div class=''>
              <h3 onclick='showProductDetails($id)' class='font-weight-bold mb-2'>$name</h3>
            </div>
            <p class='font-italic text-muted small'>$description</p>
            <div class=''>
              <h5 class='font-weight-bold my-2 text-primary'>\$$price</h5>
            </div>
            <div class='d-flex flex-row pt-4'>
              <button class='me-2 btn btn-primary fw-semibold'>Purchase</button>
              <button class='ms-2 btn btn-danger fw-semibold'>Add to cart</button>
            </div>
          </div>

        </div> <!-- End -->
      ";

    ?>
  </div>
</div>

<!-- Edit and remove button (only applied for admin role) -->
<?php
  if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin")
  {
    echo "
    <div class='row'>
      <div class='mt-4 col-11 mx-auto d-flex justify-content-center'>
        <div>
          <button class='border border-0 btn btn-light me-2' onclick='editProduct($id)'>
            <i class='bi bi-pencil-square'></i>
            Edit this product
          </button>
          <button class='border border-0 btn btn-danger ms-2' onclick='removeProduct($id)'>
            <i class='bi bi-trash3'></i>
            Remove this product
          </button>
        </div>
      </div>
    </div>
    ";
  }
?>