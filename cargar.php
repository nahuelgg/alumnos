<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu servidor de base de datos tiene un nombre diferente
$username = "root"; // Cambia esto por tu nombre de usuario de la base de datos
$password = ""; // Cambia esto por tu contraseña de la base de datos
$dbname = "colegio"; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir los datos del formulario
$dni = $_POST["dni"];
$fnacimiento = $_POST["fnacimiento"];
$nomyape = $_POST["nomyape"];
$ciudad = $_POST["ciudad"];
$domicilio = $_POST["domicilio"];
$mail = $_POST["mail"];
$genero = $_POST["genero"];
$telefono = $_POST["telefono"];

// Preparar la consulta SQL
$sql = "INSERT INTO colegio.alumnos(dni, fnacimiento, nomyape, ciudad, domicilio,  mail,  genero,  telefono) VALUES( '$dni','$fnacimiento', '$nomyape', '$ciudad', '$domicilio', '$mail', '$genero', '$telefono')";

// Ejecutar la consulta y verificar si fue exitosa
if ($conn->query($sql) === TRUE) {
    echo "Nuevo alumno registrado correctamente";
    header("Location: index.php");
    // Cerrar la conexión
    $conn->close();
    exit; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // Cerrar la conexión
    $conn->close();
}




?>
