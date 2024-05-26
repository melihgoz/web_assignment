<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
session_start();

if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
} else {
  $id = null;
}

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  header('Location: home.php');
  exit;
}
?>
