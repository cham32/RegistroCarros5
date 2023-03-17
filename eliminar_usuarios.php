<?php
    // Prepara  la consulta SQL
    //$sql="DELETE FROM usuarios Where id='".$placa."'"; 
    if (isset($_POST) && !empty($_POST)){     
        $placa = $_POST['placa']; 
        // Prepara  la consulta SQL
        $sql="DELETE FROM usuarios Where id='".$placa."'";   
    }

    include("./configdb.php");
    if (!$con)
    die('No se pudo conectar: ' . mysqli_error($con));

    // Realiza el comando
    $result = mysqli_query($con,$sql);                     

    //Cierra la conexion
    mysqli_close($con);
?>
