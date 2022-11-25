<?php
  // Get form parameters
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Check duplicate username
  $sql = "SELECT * from users WHERE username='$username'";
  $result = $conn -> query($sql);
  if ($result -> num_rows > 0) {
    header("LOCATION: index.php?page=register&error=1");
  }

  // Find the highest current user id
  $sql = "SELECT MAX(user_id) as max_id FROM users";
  $result = $conn -> query($sql);
  $row = $result -> fetch_assoc();
  // set id to 1 if there is no product id yet.
  if (!$row)
    $user_id = 1;
  else
    $user_id = $row["max_id"] + 1;
  
  // Create new user
  $sql = "INSERT INTO users (user_id, username, password, role)
          VALUE ($user_id, '$username', '$password', 'normal')";
  $result = $conn -> query($sql);
  if (!$result) {
    die("Creating new user failed: " . $conn -> error);
  }
  header("LOCATION: index.php?page=login");
?>