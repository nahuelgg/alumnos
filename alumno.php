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
                        <h5>Nombre y apellido: </h5>
                        <input class="form-control" type="text" id="nomyape"  name="nomyape" value="">
                    </div>

                    <div class="pt-3">
                        <h5>DNI: </h5>
                        <input class="form-control" type="number" id="dni" name="dni" value="" >
                    </div>


                    <div class="pt-3">
                        <h5>Fecha de nacimiento: </h5>
                        <input class="form-control" type="date" id="fnacimiento" name="fnacimiento" value=""  >
                    </div>


                    <div class="pt-3">
                        <h5>Ciudad: </h5>
                        <input class="form-control" type="text" id="ciudad"  name="ciudad" value="">
                    </div>

                    <div class="pt-3">
                        <h5>Domicilio: </h5>
                        <input class="form-control" type="text" id="domicilio"  name="domicilio"  value="">
                    </div>

                    <div class="pt-3">
                        <h5>Correo electronico: </h5>
                        <input class="form-control" type="text" id="mail"  name="mail"  value="">
                    </div>

                    <div class="pt-3">
                        <h5>Genero: </h5>
                        <input class="form-control" type="text" id="genero"   name="genero"  value="">
                    </div>

                    <div class="pt-3">
                        <h5>Telefono: </h5>
                        <input class="form-control" type="text" id="telefono"   name="telefono" value="">
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
}



?>

</body>
</html>