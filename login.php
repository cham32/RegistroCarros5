<?php
  
    $conn = mysqli_connect('localhost','Andres','1234');   

    if (!$conn) {
        // imprime un mensaje de error y sale del script
        die('No se pudo conectar: ' . mysqli_connect_error()); 
    }
    mysqli_select_db($conn,'andres'); 

    // Prepara  la consulta SQL
    $usuario = $_POST["login"];
    $contraseña =password_hash($_POST['register'],PASSWORD_DEFAULT);

    $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario = '".$usuario."' and contraseña = '".$contraseña."'");
    $nr = mysqli_num_rows($query);
    if ($nr==1) {
        header("Location:aceptado.html");
    }
    else if ($nr==0){
        header("Location:login.html");
    }
    //Cierra la conexion
    mysqli_close($conn);
?>