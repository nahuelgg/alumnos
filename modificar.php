<!DOCTYPE html>
<html>
<head>
     <!-- Agregar Bootstrap CSS -->
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Buscar Alumno por DNI</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="pt-3">
                    <h2>Buscar Alumno por DNI</h2>
                    <form action="editar.php" method="POST">
                        <label for="dni">Ingrese el DNI del alumno:</label><br>
                        <input type="text" id="dni" name="dni"><br><br>
                        <input type="submit" value="Buscar" class="btn btn-primary">
                        <a href="index.php" class="btn btn-primary">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>