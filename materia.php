<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Agregar Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Alumno</title>
</head>
<body>
    <div class="text-center pt-5 form-text">
        <h1>Cargar un alumno</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <form class="" action="" method="post">
                    
                    <div class="pt-3">
                        <h5>Nombre de la materia: </h5>
                        <input class="form-control" type="text" id="nombre"  name="nombre" value="">
                    </div>

                    <div class="pt-3">
                        <h5>cantidad_hs: </h5>
                        <input class="form-control" type="number" id="cantidad_hs" name="cantidad_hs" value="" >
                    </div>


                    <div class="pt-3">
                        <h5>tiene correlativas: </h5>
                        <input class="form-control" type="text" id="tiene_correlativas" name="tiene_correlativas" value=""  >
                    </div>


                    <div class="pt-3">
                        <h5>curso: </h5>
                        <input class="form-control" type="number" id="curso"  name="curso" value="">
                    </div>

                    
                    <div class="pt-3 droo">
                        <input type="submit" value="Enviar" class="btn btn-primary">
                        <a href="index.php" class="btn btn-primary">Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Conexión a la base de datos
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "colegio"; 

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recibir los datos del formulario
    $nombre = $_POST["nombre"];
    $cantidad_hs = $_POST["cantidad_hs"];
    $tiene_correlativas = $_POST["tiene_correlativas"];
    $curso = $_POST["curso"];

    // Preparar la consulta SQL
    $sql = "INSERT INTO colegio.materias(nombre , cantidad_hs, tiene_correlativas, curso) VALUES( '$nombre','$cantidad_hs', '$tiene_correlativas', '$curso')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Nueva materia registrada";
        header("Location: index.php");
        // Cerrar la conexión
        $conn->close();
        exit; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        // Cerrar la conexión
        $conn->close();
    }
}



?>

</body>
</html>