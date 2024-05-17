<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Agregar Bootstrap CSS -->
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


   
    $sql = "SELECT idmaterias , nombre FROM colegio.materias";
    $resultado = $conexion->query($sql);

    $sql2 = "SELECT id , nomyape FROM colegio.alumnos";
    $resultado2 = $conexion->query($sql2);
    

?>
<div class="container">
        <div class="text-center pt-5 form-text">
            <h1>Agregar Cursada</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
             <form action="" method='POST'>
                    <div class="form-group">
                    <label for="">Alumno:</label>
                        <select class="form-control" id="nombre" name="nombre">
                            <?php
                                while($alumnos = $resultado2->fetch_array()){
                                echo '<option>'. $alumnos[0] .  '</option>';}
                            ?>
                        </select>
                        
                    </div>

                    <div class="form-group">
                        <label for="">Materia:</label>
                        <select class="form-control" id="materia" name="materia">
                            <?php
                                while($materia = $resultado->fetch_array()){
                                echo '<option>' . $materia["idmaterias"] . '</option>';}
                                
                            ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Nota 1:</label>
                        <input type="number" name="nota1" id="nota1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Nota 2:</label>
                        <input type="number" name="nota2" id="nota2" class="form-control" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Asistencia:</label>
                        <input type="number" name="asistencia" id="asistencia" class="form-control" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Estado</label>
                        <input type="" name="estado" id="estado" class="form-control" placeholder="">
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
    $id_alumno = $_POST["nombre"];
    $id_materia = $_POST["materia"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $asistencia = $_POST["asistencia"];

    // Preparar la consulta SQL
    $sql = "INSERT INTO colegio.cursada(id_alumno, id_materia, nota1, nota2, asistencia) VALUES( '$id_alumno','$id_materia', '$nota1', '$nota2', '$asistencia')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "nueva materia registrada";
         
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        // Cerrar la conexión
        $conn->close();
    }
}



?>
</body>
</html>