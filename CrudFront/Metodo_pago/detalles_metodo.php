<?php
require_once('../../controlador.php');
$user=$_SESSION['user'];
$id=$_SESSION['id'];
$nombre=$_SESSION['nombre'];

$nro_tarjeta=$_REQUEST['nro_tarjeta'];
$detalles_tarjeta=$metodo_pagodao->detalle_tarjeta($nro_tarjeta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detalles de la Tarjeta</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <h2 class="text-center">Detalles de la Tarjeta</h2>
                <form method="post" action="actualizar_mp.php">
                    <div class="form-group">
                        <label for="nro_tarjeta">Número de Tarjeta:</label>
                        <input type="number" class="form-control" id="nro_tarjeta" name="nro_tarjeta" value="<?php echo $detalles_tarjeta['nro_tarjeta']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo de Tarjeta:</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $detalles_tarjeta['tipo']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="titulos">Titular:</label>
                        <input type="text" class="form-control" id="titular" name="titular" value="<?php echo $detalles_tarjeta['titular']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="number" class="form-control" id="cvv" name="cvv" value="<?php echo $detalles_tarjeta['cvv']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
                        <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value="<?php echo $detalles_tarjeta['fecha_vencimiento']?>" readonly>
                    </div>
                    <button type="button" id="Btneditar" class="btn btn-primary">Editar</button>
                    <button type="sumbit" id="Btnactualizar" class="btn btn-success" style="display: none;">Actualizar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById("Btneditar").addEventListener("click", function () {
            document.getElementById("tipo").removeAttribute("readonly");
            document.getElementById("titular").removeAttribute("readonly");
            document.getElementById("cvv").removeAttribute("readonly");
            document.getElementById("fecha_vencimiento").removeAttribute("readonly");
            document.getElementById("Btnactualizar").style.display = "block";
        });
    </script>
</body>
</html>
