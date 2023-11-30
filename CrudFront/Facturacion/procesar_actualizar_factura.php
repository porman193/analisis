<?php
require_once('../../controlador.php');
$id_factura= isset($_POST['id_factura']) ? $_POST['id_factura'] : null;
$id_registro= isset($_POST['id_registro']) ? $_POST['id_registro'] : null;
$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : null;
$placa = isset($_POST['placa']) ? $_POST['placa'] : null;
$id_plaza = isset($_POST['id_plaza']) ? $_POST['id_plaza'] : null;
$fecha_facturacion = isset($_POST['fecha_facturacion']) ? $_POST['fecha_facturacion'] : null;
$fecha_cancelacion = isset($_POST['fecha_cancelacion']) ? $_POST['fecha_cancelacion'] : null;
$estado = isset($_POST['estado']) ? $_POST['estado'] : null;
$facturadao->actualizar_factura($id_factura,$id_registro,$id_cliente,$placa,$id_plaza,$fecha_facturacion,$fecha_cancelacion,$estado);
?>