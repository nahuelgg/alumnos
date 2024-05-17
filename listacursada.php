<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1 align="center">LISTADO DE CURSOS</h1>

    <?php 
        $conn = new mysqli("localhost" , "root" , "" , "colegio");
        $sql = "SELECT * FROM colegio.cursada";
        $resultado = $conn->query($sql);
        
    ?>



        <center>
        <table border="3" align="center">
            <tr>
                <th>ID alumno</th>
                <th>ID materias</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Asistencia</th>
                <th>Estado</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            <?php
            while($cursada = mysqli_fetch_array($resultado)){
                echo"<tr>";
                    echo"<td>$cursada[1]</td>";
                    echo"<td>$cursada[2]</td>";
                    echo"<td>$cursada[3]</td>";
                    echo"<td>$cursada[4]</td>";
                    echo"<td>$cursada[5]</td>";
                    echo"<td></td>";
                    echo"<td><a href='modcursada.php?idc=$cursada[0]'>  Modificar  </a>  </td>";
                    echo"<td><a href='borrarcursada.php?idc=$cursada[0]'>  Eliminar  </a>  </td>";
                echo"</tr>";
            }
            echo"</table>";
            echo"</center>";
?>
</body>
</html>