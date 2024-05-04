<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "colegio");

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener el DNI enviado por el formulario



// Consulta para buscar al alumno por DNI
$sql = "SELECT * FROM colegio.alumnos WHERE dni='$dni'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Si se encuentra el alumno, cargar sus datos en el formulario de modificación
    $alumno = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
     <!-- Agregar Bootstrap CSS -->
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modificar Alumno</title>
</head>
<body>

<div class="text-center pt-5 form-text">
        <h1>Modificación de alumnos</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <form class="" action="guardarModificacion.php" method="post">
                    
                    <div class="pt-3">
                        <h5>Nombre y apellido: </h5>
                        <input class="form-control" type="text" id="nomyape"  name="nomyape" value="<?php echo $alumno['nomyape']; ?>">
                    </div>

                    <div class="pt-3">
                        <h5>DNI: </h5>
                        <input class="form-control" type="number" id="dni" name="dni" value="<?php echo $alumno['dni']; ?>" readonly>
                    </div>


                    <div class="pt-3">
                        <h5>Fecha de nacimiento: </h5>
                        <input class="form-control" type="date" id="fnacimiento" name="fnacimiento" value="<?php echo $alumno['fnacimiento']; ?>"  >
                    </div>


                    <div class="pt-3">
                        <h5>Ciudad: </h5>
                        <input class="form-control" type="text" id="ciudad"  name="ciudad" value="<?php echo $alumno['ciudad']; ?>">
                    </div>

                    <div class="pt-3">
                        <h5>Domicilio: </h5>
                        <input class="form-control" type="text" id="domicilio"  name="domicilio"  value="<?php echo $alumno['domicilio']; ?>">
                    </div>

                    <div class="pt-3">
                        <h5>Correo electronico: </h5>
                        <input class="form-control" type="text" id="mail"  name="mail"  value="<?php echo $alumno['mail']; ?>">
                    </div>

                    <div class="pt-3">
                        <h5>Genero: </h5>
                        <input class="form-control" type="text" id="genero"   name="genero"  value="<?php echo $alumno['genero']; ?>">
                    </div>

                    <div class="pt-3">
                        <h5>Telefono: </h5>
                        <input class="form-control" type="text" id="telefono"   name="telefono" value="<?php echo $alumno['telefono']; ?>">
                    </div>
                    <div class="pt-3">
                        <input type="submit" value="Enviar" class="btn btn-primary">
                        <a href="index.php" class="btn btn-primary">Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php
} else {
    echo "No se encontró ningún alumno con el DNI proporcionado.";
}
// Cerrar la conexión
$conexion->close();
?>
