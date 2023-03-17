<?php
session_start();

if( isset( $_SESSION['access'] ) ) {
  if ($_SESSION['access'] == 0) {
    header("Location:login.html");
  }
  if ($_SESSION['access'] == 2) {
    header("Location:usuario.php");
  }
} else {
  header("Location:login.html");
}
?>