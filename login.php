<?php
    session_start();
    include("./configdb.php");

    if (!$con) {
        // imprime un mensaje de error y sale del script
        die('No se pudo conectar: ' . mysqli_connect_error()); 
    }

    // Prepara  la consulta SQL
    $usuario = $_POST["login"];
    $contraseña =md5($_POST['register']);

    $query = mysqli_query($con,"SELECT * FROM usuarios WHERE usuario = '".$usuario."' and contraseña = '".$contraseña."'");
    $nr = mysqli_num_rows($query);
    if ($nr==1) {
        header("Location:aceptado.php");
        $_SESSION['access'] = 1;
    }
    else if ($nr==0){
        header("Location:login.html");
        $_SESSION['access'] = 0;
    }
    //Cierra la conexion
    mysqli_close($con);
?>