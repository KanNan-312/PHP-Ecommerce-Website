<div class="container h-100">
			<div class="container" style="height: 100px;"></div>
			<div class="d-flex justify-content-center">
				<img class="logo" src="assets/logo_amazon.png" alt="" class="rounded-float-start">
			</div>
			<div class="d-flex justify-content-center form_container mt-4">
				<!-- Form wrapper -->
				<div class="p-4 border border-1 border-dark border-opacity-50 rounded-2 shadow col col-5">
					<!-- Form -->
					<form method="POST" action="index.php?page=login_processing" onsubmit="return validatePassword()">
						<!-- Username -->
						<label for="input_username" class="fw-bold"> Username </label>
						<div class="input-group mb-3 mt-1">
							<input type="text" name="username" class="form-control input_user required" id="input_username" placeholder="username" required>
						</div>

						<!-- Password -->
						<label for="input_password" class="fw-bold"> Password </label>
						<div class="input-group mb-2 mt-1">
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password" required
							id="input_password"
							>
						</div>

						<!-- Log in button -->
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit" name="button" class="btn btn-primary">Log in</button>
						</div>
					</form>
					<div id="error_div"></div>
					<!-- Log in error -->
					<?php
						if (isset($_GET['error'])) {
							$message = "Log in information incorrect. Please log in again";
							echo "
								<div class='d-flex justify-content-center text-danger fw-semibold'>
									$message
								</div>
							";
						}
					?>
				</div>
			</div>
	
		<!-- Register -->
		<div class="mt-4 d-flex justify-content-center links">
			Don't have an account?&nbsp; <a href="index.php?page=register" class="ml-2"> Sign Up</a>
		</div>


		<!-- Google sign in -->
		<div id="my-signin2" class="d-flex justify-content-center mt-4">
			<div id="g_id_onload"
					data-client_id="959036718900-enh47m9skta3m5bnu1bbchgaugvb95m8.apps.googleusercontent.com"
					data-login_uri="index.php?page=google_login_processing"
					data-auto_prompt="false">
				</div>
				<div class="g_id_signin"
					data-type="standard"
					data-size="large"
					data-theme="outline"
					data-text="sign_in_with"
					data-shape="rectangular"
					data-logo_alignment="left">
				</div>
		</div>
</div>

<script>
  function validatePassword() {
    // event.preventDefault()
    let pwd = document.getElementById("input_password").value;
    let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
		let error_div = document.getElementById("error_div");
    if (!pwd.match(regex)) {
      error_div.innerHTML =  "<div class='text-danger fw-semibold'> \
      &#9888; Your password must be a combination of numbers and letters, at least 8 character long and must have at least one uppercase letter.\
       </div>"
      return false;
    }
    return true;
  }
</script>