<?php
session_start();

if( isset( $_SESSION['access'] ) ) {
  if ($_SESSION['access'] == 0) {
    header("Location:login.html");
  }
} else {
  header("Location:login.html");
}


?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/css_br.css">
  <script src="./JQuery-3.6.3/jquery-3.6.3.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="./js/scriptIndex.js"></script>
  <style>
    body{
    font-family: sans-serif;
    margin: 0;
    flex-direction: column;    
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/carrofondo.jpg");
    background-repeat: repeat;
    background-size: cover;   
}
  </style>
  <button type="button" class="regresar" onclick="location.href='./'">
	<img src="./img/casa2.png" alt="" ; width="50px" height="50px" alt="">
  </button>
  <title>Login</title>
</head>
<body>
  <section class="form-register">
    <form id="mi_formulario" method="Post">
      <h4>Aceptado</h4>
    </form>
  </section>
</body>
</html>