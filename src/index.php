<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Programming Lab</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>
  <?php
    // Connect DB
    require_once('private/controllers/connectDB.php');

    // start session
    session_start();
    // Navigate to home page
    if (!isset($_GET['page'])) {
      include 'private/views/home.php';
    }
    else {
      $page = $_GET['page'];
      switch ($page) {
        // route to pages
        case "home":
          include "private/views/home.php";
          break;
        case "products":
          include "private/views/products.php";
          break;
        case "add_product":
          include "private/views/add_product.php";
          break;
        case "edit_product":
          include "private/views/edit_product.php";
          break;
        case "show_products":
          include "private/views/show_products.php";
          break;
        case "show_details":
          include "private/views/show_details.php";
          break;
        case "show_hints":
          include "private/views/show_hints.php";
          break;
        case "contacts":
          include "private/views/contacts.php";
          break;
        case "login":
          include "private/views/login.php";
          break;
        case "register":
          include "private/views/register.php";
          break;
        case "navbar":
          include "private/views/navbar.php";
          break;

        // route to controllers
        case "login_processing":
          include "private/controllers/login_processing.php";
          break;
        case "logout":
          include "private/controllers/logout.php";
          break;
        case "google_login_processing":
          include "private/controllers/google_login_processing.php";
          break;
        case "register_processing":
          include "private/controllers/register_processing.php";
          break;
        case "insert_product":
          include "private/controllers/insert_product.php";
          break;
        case "update_product":
          include "private/controllers/update_product.php";
          break;
        case "remove_product":
          include "private/controllers/remove_product.php";
          break;
      }
    }
  ?>

</body>
</html>