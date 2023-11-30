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
}
?>