<?php
  $conn = new mysqli('localhost', 'root', 'kth302110', 'lab_db');
  if ($conn -> connect_error) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
  }
?>