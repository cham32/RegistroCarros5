<?php
$usuario = $_POST['usuario'];
$correo =$_POST['correo'];
$contraseña = md5($_POST['contraseña']);
$rol =$_POST['rol'];

include("./configdb.php");
if (!$con)
die('No se pudo conectar: ' . mysqli_error($con));

$sql = "INSERT INTO usuarios(usuario, correo, contraseña)";
$sql = $sql." VALUES('".$usuario."','".$correo."','".$contraseña."')";
$result = mysqli_query($con,$sql);                     
mysqli_close($con);
?>