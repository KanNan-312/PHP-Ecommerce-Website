<div class="container-fluid px-sm-5 px-3">
  <!-- Navbar -->
  <?php
    include 'navbar.php';
  ?>
  <!-- Contact information -->
  <div class="row">
      <div class="col col-12 col-sm-7">
          <div class="card">
              <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> CONTACT US.</div>
              <div class="card-body">
                  <form action="index.php">
                      <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                      </div>
                      <div class="form-group mt-2">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                      </div>
                      <div class="form-group mt-2">
                          <label for="message">Message</label>
                          <textarea class="form-control" id="message" rows="6" required></textarea>
                      </div>
                      <div class="mx-auto mt-2 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary text-center">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="col col-12 col-sm-5">
          <div class="card bg-light mb-3">
              <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
              <div class="card-body">
                  <p>286 Ly Thuong Kiet</p>
                  <p>Ho Chi Minh City, Vietnam</p>
                  <p>Email : hcmut@hcmut.edu.vn</p>
                  <p>Tel. +84 123 456 789</p>

              </div>

          </div>
      </div>
    </div>
  </div>

