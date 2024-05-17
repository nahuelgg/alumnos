<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    



<?php 
     // Conexión a la base de datos
     $conexion = new mysqli("localhost", "root", "", "colegio");

     // Comprobar la conexión
     if ($conexion->connect_error) {
         die("Conexión fallida: " . $conexion->connect_error);
     }
     //RECIBE EL ID DEL CURSO POR METODO GET
     $ic = $_GET["idc"];
 
 
     // Consulta para buscar la materia por id 
     $sql = "SELECT * FROM colegio.cursada WHERE id_cursada='$ic'";
     $resultado = $conexion->query($sql);
 
     $cursada = $resultado->fetch_assoc();


?>

<div class="container">
        <div class="text-center pt-5 form-text">
            <h1>Modificar Cursada</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
             <form action="" method='POST'>
                    <div class="form-group">
                    <label for="">ID Alumno:</label>
                    <input type="number" name="id_alumno" id="id_alumno" class="form-control" value="<?php echo $cursada["id_alumno"]  ?>" readonly> 
                    </div>

                    <div class="form-group">
                        <label for="">ID Materia:</label>
                        <input type="number" name="id_materia" id="id_materia" class="form-control" value="<?php echo $cursada["id_materia"]  ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Nota 1:</label>
                        <input type="number" name="nota1" id="nota1" class="form-control" value="<?php echo $cursada["nota1"]  ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Nota 2:</label>
                        <input type="number" name="nota2" id="nota2" class="form-control" placeholder="" value="<?php echo $cursada["nota2"]  ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Asistencia:</label>
                        <input type="number" name="asistencia" id="asistencia" class="form-control" placeholder="" value="<?php echo $cursada["asistencia"]  ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Estado</label>
                        <input type="" name="estado" id="estado" class="form-control" placeholder="" >
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
    $conn = new mysqli("localhost", "root", "", "colegio");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recibir los datos del formulario
    $id_alumno = $_POST["id_alumno"];
    $id_materia = $_POST["id_materia"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $asistencia = $_POST["asistencia"];

    // Preparar la consulta SQL
    $sql = "UPDATE colegio.cursada SET id_alumno = '$id_alumno' , id_materia = '$id_materia' , nota1 = '$nota1' , nota2 = '$nota2' , asistencia = '$asistencia' WHERE id_cursada = $ic ";

    //CONSULTA A LA BASE DE DATOS
    $borrado = mysqli_query($conn ,$sql); // $conn = conexion , $sql = consulta de arriba

    if ($borrado) {
        echo "El elemento se eliminó correctamente.";

    } else {
        echo "Error al eliminar el elemento: " . $conn->error;
    }
}



?>
</body>
</html>