<?php
include('controlador.php');
//PRUEBA
$user=$_SESSION['user'];
$id=$_SESSION['id'];
$nombre=$_SESSION['nombre'];
echo "$user -- $id -- $nombre";
$inn=3000;
if(isset($_SESSION['timeout'])){
    $_session_life = time() - $_SESSION['timeout'];
     if($_session_life > $inn){
        session_destroy();
        header("location:./index.html");
     }
}
$_SESSION['timeout']=time();
if($_SESSION['user']){
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home ParkBill</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php require ('topnav.php')?>
        <div id="layoutSidenav">
            
            <?php require ('sidenavbar.php')?>

            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
            <div id="layoutSidenav_content">
                <main>
                    <?php
                        $cliente=$clientedao->consultar_usuario($_SESSION['id']);
                    ?>
                    <div class="container-fluid px-4">
                            <h1 class="breadcrumb-item active text-center">Bienvenid@ <?php echo $cliente['nombre']." ".$cliente['apellido'];?></h1>
                    <h2 class="text-center">Al Sistema de Gestión del Parqueado ParkBill</h2>
                        <h3 class="mt-4">Página Principal</h3>
                        <br>
                        <div class="row">           
                            <div class="col-md-10" id="cards-izq">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Información de plazas
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
                                <br>
                                <br>
                                <?php
                                    $fondos=$fondosdao->consultar_fondos($_SESSION['id']);
                                ?>
                                <div class="col-md-3 mx-auto">  
                                <h4><center>Previsualización de Saldo en la cuenta</center></h4>
                                    <div class="card bg-success text-white md-4">
                                        <div class="card-body">Número de cuenta: <?php echo $fondos['nro_cuenta']?></div>
                                        <img src="" alt="">
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            Saldo: <?php echo $fondos['saldo']?>
                                        </div>
                                    </div> <!--Fin de carta  -->
                                </div>
                                

                            </div>
                             <!-- Cartas en la segunda columna -->
                             <div class="col-md-2" id="cards-der">
                                <h4><center>Acceso Rápido</center></h4><br>
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Añadir Método de Pago</div>
                                    <img src="" alt="">
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="CrudFront/Metodo_pago/añadir.php">Ir</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Métodos de Pago Añadidos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="CrudFront/Metodo_pago/metodos_guardados.php">Ir</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>

                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Añadir Fondos a la Cuenta</div>
                                    <img src="" alt="">
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="CrudFront/Fondos/añadir_fondos.php">Ir</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>

                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body"></div>
                                    <img src="" alt="">
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Ir</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; ParkBill 2023</div>
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
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php
}else{
    $_SESSION['user']=NULL;
    /*echo "
    <script type='text/javascript'>
     Swal.fire({
     icon : 'error',
    title : 'ERROR!!',
     text :  ' Debe iniciar Session en el Sistema'
    }).then((result) => {
         if(result.isConfirmed){
         window.location='./index.php';
        }
    }); </script>";*/
    echo "<script>window.location='./index.html';</script>";
}
?>