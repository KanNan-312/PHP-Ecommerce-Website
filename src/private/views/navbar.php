<div class="row my-sm-3 my-2 align-items-start">
  <div class="col col-md-6 col-6 text-center">
      <img class="logo" src="assets/logo_amazon.png" alt="" class="rounded-float-start">
  </div>
  <?php
    if (!isset($_SESSION["username"])) {
      echo
        '<div class="col col-md-2 col-1"> </div>
        <div class="col col-md-4 col-5 d-flex justify-content-end">
            <div class="pe-1">
              <a href="index.php?page=login" class="hover_color" style="color: white;">
                <button type="button" class="btn btn-primary">
                  Log in
                </button>
              </a>
              
            </div>
            <div class="ps-1">
              <a href="index.php?page=register" class="hover_color" style="color: white;">
                <button type="button" class="btn btn-secondary">
                  Register
                </button>
              </a>
              
          </div>
        </div>';
    }
    else {
      $username = $_SESSION["username"];
      echo 
        "<div class='col col-md-2 col-1'> </div>
        <div class='col col-md-4 col-5 d-flex justify-content-end'>
          <div class='pe-1 align-self-center fs-4'>
            Hello <span class='fw-bold'>$username</span>
          </div>
          <div class='ps-1'>
          <a href='index.php?page=logout' class='hover_color' style='color: white;'>
            <button type='button' class='btn btn-secondary'>
              Log out
            </button>
          </a>
        </div>";
    }
  ?>

</div>
<div class="row my-sm-3 my-2">
  <nav class="navbar navbar-expand-sm nav_color">

      <ul class="container-fluid navbar-nav">
          <li class="nav-item col col-sm-4 col-12 d-flex justify-content-center">
            <a class="nav-link nav_text hover_color" aria-current="page" href="index.php?page=home"> Home</a>
          </li>
          <li class="nav-item dropdown col col-sm-4 col-12 d-flex justify-content-center">
            <div>
            <a class="nav-link dropdown-toggle nav_text hover_color" href="index.php?page=products" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
              Products
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="position: absolute;">
              <li><a class="dropdown-item dropdown_text" href="index.php?page=products&type=computer">Computers</a></li>
              <li><a class="dropdown-item dropdown_text" href="index.php?page=products&type=circuit">Circuits</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item dropdown_text" href="index.php?page=products&type=other">Other products</a></li>
            </ul>
            </div>
          </li>
          <li class="nav-item col col-sm-4 col-12 d-flex justify-content-center">
            <a class="nav-link nav_text hover_color" href="index.php?page=contacts">Contacts</a>
          </li>
      </ul>
 
  </nav>
</div>

<!-- text-center -->
