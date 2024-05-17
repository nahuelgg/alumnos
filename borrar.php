<!DOCTYPE html>
<html>
<head>
     <!-- Agregar Bootstrap CSS -->
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Buscar Alumno por DNI para su eliminación</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="pt-3">
                    <h2>Buscar Alumno por DNI para su eliminación</h2>
                    <form action="" method="POST">
                        <label for="dni">Ingrese el DNI que desea eliminar:</label><br>
                        <input type="text" id="dni" name="dni"><br><br>
                        <input type="submit" value="Borrar" class="btn btn-primary">
                        <a href="index.php" class="btn btn-primary">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "colegio";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // DNI a buscar
    $dni = $_POST['dni'];

    // Consulta para eliminar el elemento por DNI
    $sql = "DELETE FROM colegio.alumnos WHERE dni = '$dni'";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "El elemento se eliminó correctamente.";
        header("Location: index.php");
        // Cerrar la conexión
        $conn->close();
        exit; 

    } else {
        echo "Error al eliminar el elemento: " . $conn->error;
    }

    // Cerrar la conexión
$conn->close();
}

?>
    
</body>
</html>