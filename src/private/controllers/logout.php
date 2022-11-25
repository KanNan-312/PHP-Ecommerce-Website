<?php
  session_start();
  session_destroy();
  header("LOCATION: http://localhost/BKWebProgramming/Lab/Lab2/index.php?page=home");
?>