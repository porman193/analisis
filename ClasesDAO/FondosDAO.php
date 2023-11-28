<!doctype html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-borderless/borderless.css" rel="stylesheet">
</head>
<body>
<?php
require_once ('Conexion.php');
class FondosDAO{
    public function consultar_fondos($id){
        $conex=Conexion::conexion();
        $sql = "select * from fondos where id_cliente=$id";
        $query = $conex->prepare($sql);
        $query->execute();
        $fondos = $query->fetch(PDO::FETCH_ASSOC);
        return $fondos;
    }
    public function actualizar_fondos($nro_cuenta, $fondos){
        $conex=Conexion::conexion();
        $sql = "update fondos set saldo=:fondos where nro_cuenta=$nro_cuenta";
        $query = $conex->prepare($sql);
        $query->bindValue(':fondos',$fondos);
        $query->execute();
        echo "
          <script type='text/javascript'>
            Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text :  'Fondos Añadidos Exitosamente Correctamente'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location='../../Home_Cliente.php';
                }
            });
          </script>
        ";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>

</html>