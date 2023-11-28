<!doctype html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-borderless/borderless.css" rel="stylesheet">
</head>
<body>
<?php
require_once('Conexion.php');
class Metodo_PagoDAO{
    public function insertar_metodo_pago($nro_tarjeta,$tipo,$titular,$cvv,$fecha_vencimiento,$id){
        $conex=Conexion::conexion();
        $sql = "insert into metodos_pago values (:nro_tarjeta,:tipo,:titular,:cvv,:fecha_vencimiento,:id_cliente)";
        $query = $conex->prepare($sql);
        $query->bindValue(':nro_tarjeta',$nro_tarjeta);
        $query->bindValue(':tipo',$tipo);
        $query->bindValue(':titular',$titular);
        $query->bindValue(':cvv',$cvv);
        $query->bindValue(':fecha_vencimiento',$fecha_vencimiento);
        $query->bindValue(':id_cliente',$id);
        $query->execute();
        echo "
          <script type='text/javascript'>
            Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text :  'Método de Pago Añadido Exitosamente Correctamente'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location='./metodos_guardados.php';
                }
            });
          </script>
        ";
    }
    public function listar_metodos_pago($id){
        $conex=Conexion::conexion();
        $sql = "select * from metodos_pago where id_cliente=$id";
        $query = $conex->prepare($sql);
        $query->execute();
        $metodos_pago = $query->fetchAll(PDO::FETCH_ASSOC);
        return $metodos_pago;
    }
    public function detalle_tarjeta($nro_tarjeta){
        $conex=Conexion::conexion();
        $sql = "select * from metodos_pago where nro_tarjeta=$nro_tarjeta";
        $query = $conex->prepare($sql);
        $query->execute();
        $detalle_tarjeta = $query->fetch(PDO::FETCH_ASSOC);
        return $detalle_tarjeta;
    }
    public function actualizar_metodo_pago($nro_tarjeta,$tipo,$titular,$cvv,$fecha_vencimiento){
        $conex=Conexion::conexion();
        $sql = "update metodos_pago set tipo=:tipo,titular=:titular,cvv=:cvv,fecha_vencimiento=:fecha_vencimiento where nro_tarjeta=$nro_tarjeta";
        $query = $conex->prepare($sql);
        $query->bindValue(':tipo',$tipo);
        $query->bindValue(':titular',$titular);
        $query->bindValue(':cvv',$cvv);
        $query->bindValue(':fecha_vencimiento',$fecha_vencimiento);
        $query->execute();
        echo "
            <script type='text/javascript'>
            Swal.fire({
                icon : 'success',
                title : 'Operacion Exitosa!!',
                text :  'Método de Pago Actualizado Correctamente'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location='./metodos_guardados.php';
                }
            });
            </script>
        ";
      }
      public function eliminar_metodo_pago($nro_tarjeta){
        $conex=Conexion::conexion();
        $sql = "delete from metodos_pago where nro_tarjeta = :nro_tarjeta";
        $query = $conex->prepare($sql);
        $query->bindvalue(':nro_tarjeta',$nro_tarjeta);
        $query->execute();
        echo "
            <script type='text/javascript'>
            Swal.fire({
                icon : 'success',
                title : 'Operacion Exitosa!!',
                text :  'Método de Pago Eliminado Correctamente'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location='./metodos_guardados.php';
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