<?php
    // Prepara  la consulta SQL
    $sql="DELETE FROM carro Where placa='".$placa."'"; 
    if (isset($_POST) && !empty($_POST)){     
        $placa = $_POST['placa']; 
        // Prepara  la consulta SQL
        $sql="DELETE FROM carro Where placa='".$placa."'";   
    }

    $con = mysqli_connect('localhost','tecmochis','zxc123zxc');
    if (!$con)
    die('No se pudo conectar: ' . mysqli_error($con));
    mysqli_select_db($con,'tecmochis');                

    // Realiza el comando
    $result = mysqli_query($con,$sql);                     

    //Cierra la conexion
    mysqli_close($con);
?>
