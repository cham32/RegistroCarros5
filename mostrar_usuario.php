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
  
    include("configdb.php");

    if (!$con) {
        // imprime un mensaje de error y sale del script
        die('No se pudo conectar: ' . mysqli_error($con)); 
    }

    // Prepara  la consulta SQL
    $sql="SELECT * FROM usuarios"; 
    
    // Realiza la consulta
    $result = mysqli_query($con,$sql);                     

    /*****  Genera la tabla respuesta ********/
    //echo "<table style='color:white;text-align:center;border: 1px solid;'>
    echo "<table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>   
            <th>Hash</th>
            <th>Acci&oacute;</th>
        </tr>";

        // Obtiene cada fila (arreglo) de resultados
        while($ren = mysqli_fetch_array($result)) {       
            echo "<tr>";
                echo '<td>' . $ren['id'] . '</td>';
                echo "<td>" . $ren['usuario'] . "</td>";
                echo "<td>" . $ren['correo'] . "</td>";
                echo "<td>" . $ren['contraseña'] . "</td>";
                echo "<td>";
                echo "     <form method='Post'>"; //El input en un form para realizar un submit ";
                echo "         <input type='image' src='img/borrar.jpg' value='Borra Todo' 
                               onclick='borrarUsuario3(".$ren['id'].")'>";
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