<?php
$usuario = $_POST['usuario'];
$correo =$_POST['correo'];
$contraseña =password_hash($_POST['contraseña'],PASSWORD_DEFAULT);

include("./configdb.php");
if (!$con)
die('No se pudo conectar: ' . mysqli_error($con));

$sql="insert into usuarios(usuario, correo, contraseña)";
$sql=$sql." values('".$usuario."','".$correo."','".$contraseña."')";
$result = mysqli_query($con,$sql);                     
mysqli_close($con);
?>