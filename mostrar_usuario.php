<html>
<head>
    <style>
        table, th, td {
            border: 1px solid;
            color:white;
            text-align:center;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<?php
  
    $con = mysqli_connect('localhost','tecmochis','zxc123zxc');   

    if (!$con) {
        // imprime un mensaje de error y sale del script
        die('No se pudo conectar: ' . mysqli_error($con)); 
    }
    mysqli_select_db($con,'tecmochis'); 

    // Prepara  la consulta SQL
    $sql="SELECT * FROM carro"; 
    
    // Realiza la consulta
    $result = mysqli_query($con,$sql);                     

    /*****  Genera la tabla respuesta ********/
    //echo "<table style='color:white;text-align:center;border: 1px solid;'>
    echo "<table>
        <tr>
            <th>Placa</th>
            <th>Tipo_vehiculo</th>
            <th>Marca</th>   
            <th>Modelo</th>
            <th>Version_modelo</th>
            <th>Numero_serie</th>
            <th>Accion</th>
        </tr>";

        // Obtiene cada fila (arreglo) de resultados
        while($ren = mysqli_fetch_array($result)) {       
            echo "<tr>";
                echo '<td>' . $ren['placa'] . '</td>';
                echo "<td>" . $ren['tipo_vehiculo'] . "</td>";
                echo "<td>" . $ren['marca'] . "</td>";
                echo "<td>" . $ren['modelo'] . "</td>";
                echo "<td>" . $ren['version_modelo'] . "</td>";
                echo "<td>" . $ren['numero_serie'] . "</td>";
                echo "<td>";
                echo "     <form method='Post'>"; //El input en un form para realizar un submit ";
                echo "         <input type='image' src='img/borrar.jpg' value='Borra Todo' 
                               onclick='borrarUsuario3(".$ren['numero_serie'].")'>";
                echo "     </form>";
                echo "</td>";
            echo "</tr>";
        }
    echo "</table>";

    //Cierra la conexion
    mysqli_close($con);
?>
</body>
</html>