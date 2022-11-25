<?php
  function validatePassword($password) {
    if (strlen($password) < 8) {
      return False;
    }
    if (!preg_match('[a-z0-9]*[A-Z][a-z0-9]*', $password)) {
      return False;
    }
    return True;
  }

  if (!isset($_POST['username']) || !isset($_POST['password'])) {
    // return error
  }
  else {
    // get form information
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * from users where username = '$username' and password = '$password'";

    // validate log in information
    $result = $conn -> query($sql);
    if ($result -> num_rows == 0) {
      // $conn -> close();
      header("LOCATION: http://localhost/BKWebProgramming/Lab/Lab2/index.php?page=login&error=1");
    }
    else {
      $row = $result -> fetch_assoc();

      // Set cookies ad create session
      setcookie($row["user_id"], 1, time()+3600);
      session_start(); //start the PHP_session function
      $_SESSION["userid"] = $row["user_id"];
      $_SESSION["username"] = $row['username'];
      $_SESSION["role"] = $row["role"];

      // redirect logged in user back to homepage
      header("LOCATION: http://localhost/BKWebProgramming/Lab/Lab2/index.php?page=home");
      // session_destroy();
    }
    
  }
?>
