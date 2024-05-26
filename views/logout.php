<?php
  include('session.php');

  // Unset all of the session variables
  session_unset();

  // Destroy the session cookie
  session_destroy();

  // Redirect to login page after logout
  header('location: home.php');
?>
