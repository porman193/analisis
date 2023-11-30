<?php
require_once('../../controlador.php');
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Eliminar Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php require('../../topnav.php') ?>
    <div id="layoutSidenav">
        <?php require('../../sidenavbarOP.php') ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Eliminar Factura</h1>
                    <form action="procesar_eliminar_factura.php" method="post">
                        <div class="mb-3">
                            <label for="form-select-factura" class="form-label">Seleccione Factura a Eliminar</label>
                            <select class="form-select" id="form-select-factura" name="form-select-factura" required>
                                <?php
                                $facturas = $facturadao->consultarFacturas();
                                foreach ($facturas as $factura) {
                                    echo "<option value='" . $factura['id_factura'] . "'>" . $factura['id_factura'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger" name="delete">Eliminar Factura</button>
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
    if (isset($_GET['alert'])) {
        $alert = $_GET['alert'];
        if ($alert == 'delete') {
            echo "
                <script type='text/javascript'>
                    Swal.fire({
                        icon: 'success',
                        title: 'Operación Exitosa!!',
                        text: 'Factura eliminada correctamente',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'eliminar_factura.php';
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
