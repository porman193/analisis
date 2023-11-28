<?php
require_once('../../controlador.php');
$user=$_SESSION['user'];
$id=$_SESSION['id'];
$nombre=$_SESSION['nombre'];
$tipo=$_SESSION['tipo'];
$concat="$tipo"."DAO";
$object = new $concat;
$info=$object->consultar_usuario($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Información de Usuario</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h1 class="text-center my-4">Datos de la cuenta</h1></div>
                                    <div class="card-body">
                                        <form action="actualizar_info.php" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="id">Idenficación</label>
                                                            <input type="number" class="form-control" id="id" name="id" value="<?php echo $_SESSION['id']?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="id">Usuario</label>
                                                            <input type="text" class="form-control" id="user" name="user" value="<?php echo $_SESSION['user']?>" readonly>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tipo">Nombre</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $info['nombre']?>" readonly>
                                                    </div>
                                                </div>  
                                                <div class="col-md-6">                                          
                                                    <div class="form-group">
                                                        <label for="titulos">Apellido</label>
                                                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $info['apellido']?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cvv">Telefono</label>
                                                <input type="number" class="form-control" id="telefono" name="telefono" value="<?php echo $info['telefono']?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="fecha_vencimiento">Correo</label>
                                                <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $info['correo']?>" readonly>
                                            </div>
                                            <button type="button" id="Btneditar" class="btn btn-primary">Editar</button>
                                            <button type="sumbit" id="Btnactualizar" class="btn btn-success" style="display: none;">Actualizar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById("Btneditar").addEventListener("click", function () {
            document.getElementById("nombre").removeAttribute("readonly");
            document.getElementById("apellido").removeAttribute("readonly");
            document.getElementById("telefono").removeAttribute("readonly");
            document.getElementById("correo").removeAttribute("readonly");
            document.getElementById("Btnactualizar").style.display = "block";
        });
    </script>
</body>
</html>
