<?php
$usuario = $_POST['usuario'];
$correo =$_POST['correo'];
$contraseña = md5($_POST['contra']);
$rol =$_POST['rol'];

include("./configdb.php");
if (!$con)
die('No se pudo conectar: ' . mysqli_error($con));

$sql = "INSERT INTO usuarios(usuario, correo, contraseña, rol)";
$sql = $sql." VALUES('".$usuario."','".$correo."','".$contraseña."',".$rol.")";
$result = mysqli_query($con,$sql);                     
mysqli_close($con);
?>