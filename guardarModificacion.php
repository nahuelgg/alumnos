<?php

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "colegio");

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los datos del formulario
    $dni = $_POST["dni"];
    $fnacimiento = $_POST["fnacimiento"];
    $nomyape = $_POST["nomyape"];
    $ciudad = $_POST["ciudad"];
    $domicilio = $_POST["domicilio"];
    $mail = $_POST["mail"];
    $genero = $_POST["genero"];
    $telefono = $_POST["telefono"];

// Actualizar los datos del alumno en la base de datos
$sql = "UPDATE colegio.alumnos SET fnacimiento = '$fnacimiento', nomyape = '$nomyape', ciudad = '$ciudad', domicilio = '$domicilio',  mail = '$mail',  genero = '$genero',  telefono = '$telefono' WHERE dni=$dni";

if ($conexion->query($sql) === TRUE) {
    echo "Los datos se actualizaron correctamente.";
    header("Location: index.php");
    // Cerrar la conexión
    $conn->close();
    exit; 

} else {
    echo "Error al actualizar los datos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
$conn->close();
exit; 
?>
