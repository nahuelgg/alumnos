<?php 
     // Conexión a la base de datos
     $conexion = new mysqli("localhost", "root", "", "colegio");

     // Comprobar la conexión
     if ($conexion->connect_error) {
         die("Conexión fallida: " . $conexion->connect_error);
     }


     
    $im = $_GET["idm"];


    // Consulta para buscar la materia por id 
    $sql = "SELECT * FROM colegio.materias WHERE idmaterias='$im'";
    $resultado = $conexion->query($sql);

    $materia = $resultado->fetch_assoc();

     if($_SERVER['REQUEST_METHOD'] === 'GET'){
     
        // Consulta para eliminar el elemento por id
        $sql = "DELETE FROM colegio.materias WHERE idmaterias='$im'";
        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "El elemento se eliminó correctamente.";
    
        } else {
            echo "Error al eliminar el elemento: " . $conexion->error;
        }
    
        // Cerrar la conexión
    $conexion->close();
    }
    

?>