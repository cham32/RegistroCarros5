<?php
    $placa = intval($_POST['placa']);                         
    $tipo_vehiculo = $_POST['tipo_vehiculo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $version_modelo = intval($_POST['version_modelo']);
    $numero_serie = $_POST['numero_serie'];

    include("./configdb.php");
    if (!$con)
    die('No se pudo conectar: ' . mysqli_error($con));
    
    // Prepara  la consulta SQL
    $sql="insert into carro(placa, tipo_vehiculo, marca, modelo, version_modelo, numero_serie)";
    $sql=$sql." values('".$placa."','".$tipo_vehiculo."','".$marca."','".$modelo."','".$version_modelo."','".$numero_serie."')";   
    // Realiza la consulta
    $result = mysqli_query($con,$sql);                     
   
    //Cierra la conexion
    mysqli_close($con);
?>

