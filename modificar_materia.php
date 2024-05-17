<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Agregar Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Materia</title>
</head>
<body>

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
  ?>
    <div class="text-center pt-5 form-text">
        <h1>Modificar materia</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <form class="" action="" method="post">
                    
                    <div class="pt-3">
                        <h5>Nombre de la materia: </h5>
                        <input class="form-control" type="text" id="nombre"  name="nombre" value="<?php echo $materia['nombre']; ?>">
                    </div>

                    <div class="pt-3">
                        <h5>cantidad hs: </h5>
                        <input class="form-control" type="number" id="cantidad_hs" name="cantidad_hs" value="<?php echo $materia['cantidad_hs']; ?>" >
                    </div>


                    <div class="pt-3">
                        <h5>tiene correlativas: </h5>
                        <input class="form-control" type="text" id="tiene_correlativas" name="tiene_correlativas" value="<?php echo $materia['tiene_correlativas']; ?>" >
                    </div>


                    <div class="pt-3">
                        <h5>curso: </h5>
                        <input class="form-control" type="number" id="curso"  name="curso" value="<?php echo $materia['curso']; ?>">
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

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "colegio");

    // Comprobar la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){


    // Recibir los datos del formulario
    $nombre = $_POST["nombre"];
    $cantidad_hs = $_POST["cantidad_hs"];
    $tiene_correlativas = $_POST["tiene_correlativas"];
    $curso = $_POST["curso"];

    // Preparar la consulta SQL
    $sql = "UPDATE colegio.materias SET nombre = '$nombre', cantidad_hs = '$cantidad_hs', tiene_correlativas = '$tiene_correlativas', curso = '$curso' WHERE idmaterias=$im";

    

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "Nueva materia registrada";
        header("Location: index.php");
        // Cerrar la conexión
        $conexion->close();
        exit; 
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
        // Cerrar la conexión
        $conexion->close();
    }
    }
?>

