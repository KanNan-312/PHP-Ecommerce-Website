<?php
	if(isset($_GET["error"])) {
		if($_GET["error"] == 0) {
			echo "<script>alert('User created successfully)</script>";
		}
	}
?>
<div class="container h-100">
			<div class="container" style="height: 100px;"></div>
			<div class="d-flex justify-content-center">
				<img class="logo" src="logo_amazon.png" alt="" class="rounded-float-start">
			</div>
			<div class="d-flex justify-content-center form_container mt-4">
				<!-- Form wrapper -->
				<div class="p-4 border border-1 border-dark border-opacity-50 rounded-2 shadow col col-5">
          <!-- Form -->
					<form method="POST" action="index.php?page=register_processing" onsubmit="return validatePassword(event)">
            <!-- Username -->
						<label for="input_username" class="fw-bold"> Username </label>
						<div class="input-group mb-3 mt-1">
							<input type="text" name="username" class="form-control input_user" id="input_username" placeholder="username">
						</div>

            <!-- Password -->
						<label for="input_password" class="fw-bold"> Password </label>
						<div class="input-group mb-2 mt-1 px-1 d-flex">
							<input type="password" id="input_password" name="password" class="form-control input_pass me-2" value="" placeholder="password">
              <!-- confirm -->
							<input type="password" id="input_password_confirm" name="password_confirm" class="form-control input_pass ms-2" value="" placeholder="Confirm">
              
            </div>
            <div id="confirm_password_error"></div>

            <!-- Register -->
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit" name="button" class="btn btn-secondary">Register</button>
						</div>
					</form>
					<?php
						if (isset($_GET['error'])) {
							$message = "This username has been used. Please use another username";
							echo "
								<div class='d-flex justify-content-center text-danger fw-semibold'>
                &#9888;$message
								</div>
							";
						}
					?>
				</div>
			</div>

</div>
<script>
  function validatePassword(event) {
    // event.preventDefault()
    let pwd = document.getElementById("input_password").value;
    let pwd_confirm = document.getElementById("input_password_confirm").value;
    let error_div = document.getElementById("confirm_password_error");
    let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
    if (!pwd.match(regex)) {
      error_div.innerHTML =  "<div class='text-danger fw-semibold'> \
      &#9888; Your password must be a combination of numbers and letters, at least 8 character long and must have at least one uppercase letter.\
       </div>"
      return false;
    }
    else if (pwd != pwd_confirm) {
      error_div.innerHTML =  "<div class='text-danger fw-semibold'>&#9888; Those passwords didn’t match. Try again </div>"
      return false;
    }
    return true;
  }
</script>