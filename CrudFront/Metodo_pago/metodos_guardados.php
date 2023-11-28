<?php
require_once('../../controlador.php');
$metodos_guardados=$metodo_pagodao->listar_metodos_pago($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Metodos de Pago</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php require ('../../topnav.php')?>
        <div id="layoutSidenav">

             <?php require ('../../sidenavbar.php')?>

            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Métodos de Pago Actuales</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <?php
                                for($i=0;$i<count($metodos_guardados);$i++){
                            ?> 
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                        <div class="card-body text-center alert alert-primary text-white" style=""><?php echo " ".$metodos_guardados[$i]['tipo']." ".$metodos_guardados[$i]['nro_tarjeta'];?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="btn btn-secondary text-white" href="detalles_metodo.php?nro_tarjeta=<?php echo $metodos_guardados[$i]['nro_tarjeta'];?>">Detalles</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                            <a class="btn btn-danger text-white" href="eliminar_mp.php?nro_tarjeta=<?php echo $metodos_guardados[$i]['nro_tarjeta'];?>">Eliminar</a>
                                        </div>                                   
                                </div>
                            </div>
                        <?php
                            }                                
                        ?>
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