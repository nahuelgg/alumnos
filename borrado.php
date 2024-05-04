<?php
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
?>
