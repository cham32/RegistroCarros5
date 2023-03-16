<?php
$usuario = $_POST['usuario'];
$correo =$_POST['correo'];
$contraseña =password_hash($_POST['contraseña'],PASSWORD_DEFAULT);
$con = mysqli_connect('localhost','Andres','1234');
if (!$con)
die('No se pudo conectar: ' . mysqli_error($con));
mysqli_select_db($con,'andres');
$sql="insert into usuarios(usuario, correo, contraseña)";
$sql=$sql." values('".$usuario."','".$correo."','".$contraseña."')";
$result = mysqli_query($con,$sql);                     
mysqli_close($con);
?>