<?php
    require_once('../../controlador.php');
    $id_factura = $_GET['id_factura']; 

    
    $factura_a_actualizar = $facturadao->obtener_factura($id_factura); 

    // Verificar si el vehículo existe
    if ($factura_a_actualizar) {
        $id_factura_actual = $factura_a_actualizar['id_factura'];
        $id_registro_actual = $factura_a_actualizar['id_registro'];
        $id_cliente_actual = $factura_a_actualizar['id_cliente'];
        $placa_actual = $factura_a_actualizar['placa'];
        $id_plaza_actual = $factura_a_actualizar['id_plaza'];
        $fecha_factiuracion_actual = $factura_a_actualizar['fecha_facturacion'];
        $fecha_cancelacion_actual = $factura_a_actualizar['fecha_cancelacion'];
        $estado_actual = $factura_a_actualizar['estado'];
        
    } else {
        // Manejar el caso en que el vehículo no existe
        // Puedes redirigir a una página de error o realizar alguna otra acción
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Facturas</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php require ('../../topnav.php')?>
        <div id="layoutSidenav">

             <?php 
             
                if ($_SESSION['tipo']=="operario")
                require ('../../sidenavbarOP.php');
             
             ?>

            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Actualizar Factura</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"></li>
                    </ol>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Actualizar Factura
                        </div>
                        <div class="card-body">
                            <form action="procesar_actualizar_factura.php" method="post" class="row g-3">
                            <div class="col-md-6">
                                        <label for="id_factura" class="form-label">id Factura:</label>
                                        <input type="text" name="id_factura" class="form-control" value="<?php echo $id_factura_actual; ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="id_registro" class="form-label">id registro:</label>
                                        <input type="text" name="id_registro" class="form-control" value="<?php echo $id_registro_actual; ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="id_cliente" class="form-label">id cliente:</label>
                                        <input type="text" name="id_cliente" class="form-control"  value="<?php echo $id_cliente_actual; ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="placa" class="form-label">Placa:</label>
                                    <input type="text" name="placa" class="form-control" value="<?php echo $placa_actual; ?>" required>
                                </div>
                                    <div class="col-md-6">
                                        <label for="id_plaza" class="form-label">id plaza:</label>
                                        <input type="text" name="id_plaza" class="form-control"  value="<?php echo $id_plaza_actual; ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="fecha_facturacion" class="form-label">fecha facturacion:</label>
                                        <input type="date" name="fecha_facturacion" class="form-control"  value="<?php echo $fecha_ingreso_actual; ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="fecha_cancelacion" class="form-label">fecha cancelacion:</label>
                                        <input type="date" name="fecha_cancelacion" class="form-control" value="<?php echo $fecha_salida_actual; ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="estado" class="form-label">Estado:</label>
                                        <input type="text" name="estado" class="form-control" value="<?php echo $estado_actual; ?>" required>
                                    </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Actualizar Factura</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; ParkBill Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/demo/chart-area-demo.js"></script>
        <script src="../../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php

?>