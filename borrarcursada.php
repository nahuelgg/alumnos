<?php 

    $conn = new mysqli("localhost" , "root" , "" , "colegio");

    $ic = $_GET["idc"];
    $sql = "SELECT * FROM colegio.cursada WHERE id_cursada = $ic";
    $resultado = $conn->query($sql);
    $cursada = $resultado->fetch_assoc();
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
     
        // Consulta para eliminar el elemento por id
        $sql = "DELETE FROM colegio.cursada WHERE id_cursada='$ic'";

       //ejecuta la consulta
        $borrado = mysqli_query($conn ,$sql);

        if ($borrado) {
            echo "El elemento se eliminó correctamente.";
    
        } else {
            echo "Error al eliminar el elemento: " . $conn->error;
        }
    }
    

?>