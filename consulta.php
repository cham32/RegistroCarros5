<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head>

<body>

<?php
    //Obtiene el valor enviado
    $q = intval($_GET['q']);                              
    $con = mysqli_connect('localhost','tecmochis','zxc123');
    if (!$con)
    die('No se pudo conectar: ' . mysqli_error($con));
    mysqli_select_db($con,'tecmochis');

    // Prepara  la consulta SQL
    $sql="SELECT * FROM carro WHERE placa = '".$q."'";   
    
    // Realiza la consulta
    $result = mysqli_query($con,$sql);                     

    /*************  Genera la tabla respuesta ************************/
    echo "<table>
        <tr>
            <th>placa</th>
            <th>tipo_vehiculo</th>   
            <th>marca</th>
            <th>modelo</th>
            <th>version_modelo</th>
            <th>numero_serie</th>
        </tr>";

        // Obtiene cada fila (arreglo) de resultados
        while($row = mysqli_fetch_array($result)) {       
            echo "<tr>";
            echo '<td>' . $row['placa'] . '</td>';
            echo "<td>" . $row['tipo_vehiculo'] . "</td>";
            echo "<td>" . $row['marca'] . "</td>";
            echo "<td>" . $row['modelo'] . "</td>";
            echo "<td>" . $row['version_modelo'] . "</td>";
            echo "<td>" . $row['numero_serie'] . "</td>";
            echo "<td>";
                echo "     <form method='Post'>"; //El input en un form para realizar un submit ";
                echo "         <input type='image' src='img/borrar.jpg' value='Borra Todo' 
                               onclick='borrarUsuario3(".$row['placa'].")'>";
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
