<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Materia</title>
</head>
<body>
    <h1 align="center">LISTADO DE MATERIA</h1>
<?php

 // Crear conexión
 $conn = new mysqli("localhost", "root", "", "colegio");

 // Verificar la conexión
 if ($conn->connect_error) {
     die("Conexión fallida: " . $conn->connect_error);
 }

$sql = "SELECT nombre , cantidad_hs, tiene_correlativas, curso , idmaterias
        FROM colegio.materias";
$res = mysqli_query($conn,$sql);
if ($res==False){
    echo"No se encontraron registros";
}
else{
    ?>
   
    <center>
        <table border="3" align="center">
            <tr>
                <th>Materia</th>
                <th>Cantidad de hs</th>
                <th>Correlativas</th>
                <th>curso</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            <?php
            while($vec = mysqli_fetch_array($res)){
                echo"<tr>";
                    echo"<td>$vec[0]</td>";
                    echo"<td>$vec[1]</td>";
                    echo"<td>$vec[2]</td>";
                    echo"<td>$vec[3]</td>";
                    echo"<td><a href='modificar_materia.php?idm=$vec[4]'>  Modificar  </a>  </td>";
                    echo"<td><a href='bormateria.php?idm=$vec[4]'>  Eliminar  </a>  </td>";
                echo"</tr>";
            }
            echo"</table>";
            echo"</center>";
           
}
?>


    
       
    
</body>

</html>