<?php
require_once('Conexion.php');
class FacturaDAO{
    public function consultarFacturas() {
        $db = Conexion::conexion();
        $sql = "SELECT * FROM factura";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $facturas = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return $facturas;
    }

    public function ingresarFactura($id_factura,$id_registro,$id_cliente,$placa,$id_plaza,$fecha_facturacion,$fecha_cancelacion,$estado){
        $db = Conexion::conexion();
        $sql = "INSERT INTO factura (id_factura,id_registro,id_cliente,placa,id_plaza,fecha_facturacion,fecha_cancelacion,estado) VALUES (?,?,?,?,?,?,?,?)";
        $consulta = $db->prepare($sql);
        $consulta->execute([$id_factura,$id_registro,$id_cliente,$placa,$id_plaza,$fecha_facturacion,$fecha_cancelacion,$estado]);
    }

    public function obtener_factura($id_factura){
        $conex=Conexion::conexion();
        $sql = "SELECT * FROM factura where id_factura = :id_factura";
        $query = $conex->prepare($sql);
        $query->bindvalue(':id_factura',$id_factura);
        $query->execute();
        $facturas = $query->fetch(PDO::FETCH_ASSOC);
        return $facturas;
    }

    public function actualizar_factura($id_factura,$id_registro,$id_cliente,$placa,$id_plaza,$fecha_facturacion,$fecha_cancelacion,$estado){
        $conex=Conexion::conexion();
        $sql = "UPDATE factura SET id_registro=:id_registro,id_cliente=:id_cliente,placa=:placa,id_plaza=:id_plaza, fecha_facturacion=:fecha_facturacion,fecha_cancelacion=:fecha_cancelacion, estado=:estado where id_factura= :id_factura";
        $query = $conex->prepare($sql);
        $query->bindValue(':id_registro',$id_registro);
        $query->bindValue(':id_cliente',$id_cliente);
        $query->bindValue(':placa', $placa);
        $query->bindValue(':id_plaza',$id_plaza);
        $query->bindValue(':fecha_facturacion',$fecha_facturacion);
        $query->bindValue(':fecha_cancelacion',$fecha_cancelacion);
        $query->bindValue(':estado', $estado);
        $query->bindValue(':id_factura', $id_factura);
        $query->execute();
        echo "
            <script type='text/javascript'>
            Swal.fire({
                icon : 'success',
                title : 'Operacion Exitosa!!',
                text :  'factura Actualizada Correctamente'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location='./facturacion.php';
                }
            });
            </script>
        ";
      }

    public function eliminar_factura($id_factura){
        $db = Conexion::conexion();
        $sql = "DELETE FROM factura WHERE id_factura = ?";
        $consulta = $db->prepare($sql);
        $consulta->execute([$id_factura]);
    }
}
?>