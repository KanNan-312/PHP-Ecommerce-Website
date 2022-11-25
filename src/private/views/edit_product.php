<?php
  // Get product information to set placeholder
  $product_id = $_GET["product_id"];
  $sql = "SELECT * from products WHERE product_id = $product_id";
  $result = $conn -> query($sql);
  $row = $result -> fetch_array();

  // retrieve placeholder values
  $product_name = $row["product_name"];
  $category = $row["category"];
  $description = $row["description"];
  $price = $row["price"];
  $url = $row["image_url"];
?>
<div class="container-fluid px-sm-5 px-3">
  <?php
    include 'navbar.php';
  ?>
  <div class="row">
    <div class="d-flex justify-content-center form_container mt-4">
      <!-- Form wrapper -->
      <div class="p-4 border border-1 border-dark border-opacity-50 rounded-2 shadow col col-5">
        <!-- Form -->
        <?php echo "<form method='POST' action='index.php?page=update_product&product_id=$product_id'>" ?>
          <!-- Product name -->
          <label class="fw-bold"> Product name </label>
          <div class="input-group mb-3 mt-1">
            <?php echo "<input type='text' id='input_name' name='product_name' class='form-control input_user' value='$product_name'>" ?>
          </div>

          <!-- Category -->
          <label class="fw-bold"> Category </label>

          <div class="input-group mb-3 mt-1">
            <?php
              echo "<select id='input_category' name='category' class='form-control input_user' value='$category'>";
              foreach (array("computer", "circuit", "other") as $cat) {
                echo ($cat === $category)? "<option value=$cat selected>$cat</option>" : "<option value=$cat>$cat</option>";
              }
              echo "</select> "
            ?>
          </div>
          
          <!-- Product description -->
          <label class="fw-bold"> Description </label>
          <div class="input-group mb-3 mt-1">
            <?php echo "<input id='input_description' type='text' name='description' class='form-control input_user' value='$description'>" ?>
          </div>

          <!-- Product price -->
          <label class="fw-bold"> Price </label>
          <div class="input-group mb-3 mt-1">
            <?php echo "<input id='input_price' type='number' step='0.1' name='price' class='form-control input_user' value='$price'>" ?>
          </div>

          <!-- Product image url -->
          <label class="fw-bold"> Image URL (optional) </label>
          <div class="input-group mb-3 mt-1">
            <?php echo "<input id='input_url' type='text' name='url' class='form-control input_user' value='$url'>" ?>
          </div>
          <!-- Save, cancel buttons -->
          <div class="d-flex justify-content-center mt-3 login_container">
              <button type="submit" name="button" class="btn btn-success me-2">Save changes</button>
              <button type="button" class="btn btn-danger ms-2" onclick="cancel()">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function cancel() {
    window.location.href = "index.php?page=products";
  }
</script>