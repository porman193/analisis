<?php
require_once('../../controlador.php');
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
                        <h1 class="mt-4">Información de Plazas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/home/parqueadero/Home_Operario.php">Home</a></li>
                            <li class="breadcrumb-item active">Información de plazas</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Plazas del parqueadero
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Plaza</th>
                                            <th>Piso</th>
                                            <th>Tarifa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                <?php
                                                    $plazas=$plazasdao->consultar_plazas();
                                                    for ($i=0; $i < count($plazas); $i++) {                                                     
                                                ?>
                                                    <tr>
                                                        <td><?php echo $plazas[$i]['id_plaza']?></td>
                                                        <td><?php echo $plazas[$i]['piso']?></td>
                                                        <td><?php echo $plazas[$i]['tarifa']?></td>
                                                    </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                </table>
                            </div>
                        </div>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script>
    </body>
</html>
