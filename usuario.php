<?php
session_start();

if( isset( $_SESSION['access'] ) ) {
  if ($_SESSION['access'] == 0) {
    header("Location:login.html");
  }
  if ($_SESSION['access'] == 1) {
    header("Location:admin.php");
  }
} else {
  header("Location:login.html");
}
?>