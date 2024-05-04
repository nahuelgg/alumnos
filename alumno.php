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
                
                <form class="" action="cargar.php" method="post">
                    
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