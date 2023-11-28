<?php
require_once('../../controlador.php');
$id= $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Plazas</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php require ('../../topnav.php')?>
        <div id="layoutSidenav">
            <?php require('../../sidenavbarOP.php') ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Eliminar asignacion de plazas</h1>
                        <form action="procesar_eliminar_plazas.php" method="post">
                        <div class="mb-3">
                            <label for="form-select-car" class="form-label">Seleccione placa de Vehiculo</label>
                            <select class="form-select" id="form-select-car" name="form-select-car" required>
                                <?php
                                    $vehiculos=$vehiculosdao->consultar_autos();
                                    for ($i=0; $i < count($vehiculos); $i++) {
                                        echo "
                                            <option value=".$vehiculos[$i]['placa'].">".$vehiculos[$i]['placa']."</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger" name="update">Eliminar plaza</button>
                    </form>
                    </div>
                    
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
        <?php
            if(isset($_GET['alert'])){
                $alert = $_GET['alert'];
                if($alert == 'delete'){
                    echo "
                        <script type='text/javascript'>
                            Swal.fire({
                                icon: 'success',
                                title: 'Operación Exitosa!!',
                                text: 'Plaza eliminada correctamente',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'eliminar_plazas.php';
                                }
                            });
                        </script>
                    ";
                }
            } 
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script>
    </body>
</html>
