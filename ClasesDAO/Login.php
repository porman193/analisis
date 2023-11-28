<!doctype html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-borderless/borderless.css" rel="stylesheet">
</head>
<body>
<?php
require_once('Conexion.php');
session_start();
class Login{
    public function validar($user,$pass){
         $conex=Conexion::conexion();
            $sql="select * from usuario where user='$user' and pass='$pass'";
            $query=$conex->prepare($sql);
            $query->execute();
            $datauser= $query->fetch(PDO::FETCH_ASSOC);
            echo "--".$datauser;
            if ($datauser==NULL) {
               $_SESSION['user']=NULL;
               echo "
                  <script type='text/javascript'>
                     Swal.fire({
                     icon : 'error',
                     title : 'Error al iniciar sesión!!',
                     text :  'Vuelva a intentarlo nuevamente'
                     }).then((result) => {
                        if(result.isConfirmed){
                           window.location='index.html';
                        }
                     });
                  </script>
               ";
            }else{
               $_SESSION['user']= $datauser['user'];
               $tipo=$datauser['tipo'];
               $_SESSION['tipo']= $tipo;
               $sql2="select * from $tipo where user='$user'";
               $query=$conex->prepare($sql2);
               $query->execute();
               $datatipo= $query->fetch(PDO::FETCH_ASSOC);
               
               $_SESSION['nombre']= $datatipo['nombre'];
                if($datauser['tipo']=="operario"){
                  $_SESSION['id']= $datatipo['id_operario'];
                   header('location: Home_Operario.php');
                }else if ($datauser['tipo']=="cliente"){
                  $_SESSION['id']= $datatipo['id_cliente'];
                   header('location: Home_Cliente.php');
                }
            }   
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>

</html>