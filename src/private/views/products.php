<div class="container-fluid px-sm-5 px-3">
  <?php
    include 'navbar.php';
    $type = isset($_GET["type"]) ? $_GET["type"] : "";
    echo "<div id='type' hidden>$type</div>";
  ?>
  <!-- Search bar -->
  <div class="row">
    <div class="form-outline mb-4 col-11 mx-auto d-flex">
      <div class="flex-grow-1 d-flex flex-column position-relative">
        <input type='search' class='form-control dropdown_text' id='datatable-search-input' placeholder='Search for products...' onkeyup='showHint(this.value)'>
        <!-- Hint box (for autocomplete) -->
        <div id="hint_box" class="flex-fill border border-1 rounded-2 shadow style_hint_box">
        </div>
      </div>
      <button type='button' class='btn btn-primary ms-2' onclick='searchButtonClicked()'>
        <i class='bi bi-search'></i>
      </button>
    </div>

  </div>

  <div id="products_wrapper">
    <?php
      include "show_products.php";
    ?>
  </div>
</div>

<script>
  function search(search_key) {
    let type = document.getElementById("type").innerText
    // console.log(search_key)
    // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("products_wrapper").innerHTML = this.responseText;
    };
    let url = (type == '') ? `http://localhost/BKWebProgramming/Lab/PHP-Ecommerce-Website/src/index.php?page=show_products&search=${search_key}` 
                           : `http://localhost/BKWebProgramming/Lab/PHP-Ecommerce-Website/src/index.php?page=show_products&search=${search_key}&type=${type}`
    // let url = `index.php?page=show_products&search=${search_key}`;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  }

  function searchButtonClicked() {
    document.getElementById("hint_box").innerHTML = ""
    let search_key = document.getElementById("datatable-search-input").value
    search(search_key)
  }
</script>

<script>
  function showHint(value) {
    let type = document.getElementById("type").innerText
    let search_key = document.getElementById("datatable-search-input").value
    if(search_key == "") {
      // console.log('haha')
      document.getElementById("hint_box").innerHTML = ""
      return
    }
    // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      // const json_response = JSON.parse(this.responseText)
      document.getElementById("hint_box").innerHTML = this.responseText;

    };
    let url = (type == '') ? `http://localhost/BKWebProgramming/Lab/PHP-Ecommerce-Website/src/index.php?page=show_hints&search=${search_key}` 
                           : `http://localhost/BKWebProgramming/Lab/PHP-Ecommerce-Website/src/index.php?page=show_hints&search=${search_key}&type=${type}`
    // let url = `index.php?page=show_products&search=${search_key}`;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  }

  function hintClicked(hint) {
    document.getElementById("hint_box").innerHTML = ""
    document.getElementById("datatable-search-input").value = hint
    search(hint)
  }
</script>

<script>
  function showProductDetails(product_id) {
    // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      // const json_response = JSON.parse(this.responseText)
      document.getElementById("products_wrapper").innerHTML = this.responseText;

    };

    xmlhttp.open("GET", `http://localhost/BKWebProgramming/Lab/PHP-Ecommerce-Website/src/index.php?page=show_details&product_id=${product_id}`, true);
    xmlhttp.send();
  }
</script>

<script>
  function editProduct(id) {
    window.location.href = `index.php?page=edit_product&product_id=${id}`
  }
  function removeProduct(id) {
    var result = confirm("Are you sure to delete this item?")
    if (result) {
      window.location.href = `index.php?page=remove_product&product_id=${id}`;
    }
  }
</script>