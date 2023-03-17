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

    $sql = "SELECT * FROM usuarios WHERE usuario = '".$usuario."' and contraseña = '".$contraseña."'";
    $query = mysqli_query($con,$sql);
    $nr = mysqli_num_rows($query);
    $ren = mysqli_fetch_array($query);
    if ($nr==1) {
        if($ren['rol'] == 1){
            $_SESSION['access'] = 1;
            header("Location:admin.php");
        } else if ($ren['rol'] == 2){
            $_SESSION['access'] = 2;
            header("Location:usuario.php");
        }
    }
    else if ($nr==0){
        header("Location:login.html");
        $_SESSION['access'] = 0;
    }
    //Cierra la conexion
    mysqli_close($con);
?>