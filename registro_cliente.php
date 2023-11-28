<?php
session_start();
$user = isset($_SESSION['user_reg']) ? $_SESSION['user_reg'] : '';
$id = isset($_SESSION['id_reg']) ? $_SESSION['id_reg'] : '';
$nombre = isset($_SESSION['nombre_reg']) ? $_SESSION['nombre_reg'] : '';
$apellido = isset($_SESSION['apellido_reg']) ? $_SESSION['apellido_reg'] : '';
$telefono = isset($_SESSION['telefono_reg']) ? $_SESSION['telefono_reg'] : '';
$correo = isset($_SESSION['correo_reg']) ? $_SESSION['correo_reg'] : '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registro</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script>
            function verificarContraseñas() {
            var password = document.querySelector("input[name='pass']").value;
            var confirmPassword = document.querySelector("input[name='confpass']").value;

                if (password !== confirmPassword) {
                    alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
                    return false;
                }

            return true;
            }
        </script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h2 class="text-center font-weight-light my-4">Crear cuenta</h2></div>
                                    <div class="card-body">
                                        <form action="CrudFront/Usuario/insertar_cliente.php" method="post" onsubmit="return verificarContraseñas();">
                                            <div class="row mb-3"><h4 class="text-center">Datos Personales</h4>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" name="id" type="number" placeholder="" value="<?php echo $id; ?>"  />
                                                        <label for="id">Identificación</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="nombre" type="text" placeholder="" value="<?php echo $nombre; ?>" />
                                                        <label for="nombre">Nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="apellido" type="text" placeholder="" value="<?php echo $apellido; ?>" />
                                                        <label for="apellido">Apellido</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="telefono" type="number" placeholder="" value="<?php echo $telefono; ?>" />
                                                        <label for="telefono">Telefono</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="correo" type="email" placeholder="" value="<?php echo $correo; ?>" />
                                                        <label for="correo">Correo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3"><h4 class="text-center">Datos de Usuario</h4>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="user" type="text" placeholder="" value="<?php echo $user; ?>" />
                                                        <label for="user">Usuario</label>
                                                    </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" name="pass" type="password" placeholder="" />
                                                            <label for="pass">Contraseña</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" name="confpass" type="password" placeholder="" />
                                                            <label for="confpass">Confirmar Contraseña</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4 mb-0">
                                                
                                                <div class="d-grid">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Aceptar" >
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        <script src="js/scripts.js"></script>
    </body>
</html>
