<?php
  // composer require google/apiclient;
  require_once 'vendor/autoload.php';

  // Get $id_token via HTTPS POST.
  $id_token = $_POST['credential'];
  $CLIENT_ID = "959036718900-enh47m9skta3m5bnu1bbchgaugvb95m8.apps.googleusercontent.com";
  $client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
  $payload = $client->verifyIdToken($id_token);
  if ($payload) {
    // print_r($payload);
    $userid = $payload['sub'];
    $username = $payload["name"];
    // Set cookies ad create session

    setcookie($userid, 1, time()+3600);
    session_start(); //start the PHP_session function
    $_SESSION["userid"] = $userid;
    $_SESSION["username"] = $username;
    $_SESSION["role"] = "normal";

    // redirect logged in user back to homepage
    header("LOCATION: index.php?page=home");
  } else {
    // Invalid ID token
    echo "Invalid ID token";
}

?>