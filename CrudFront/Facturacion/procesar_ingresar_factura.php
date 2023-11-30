<?php
    require_once('../../controlador.php');
    $id_factura = $_REQUEST['idFactura'];
    $placa=$_REQUEST['form-select-car'];
    $id_cliente=$_REQUEST['form-select_client'];
    $plaza=$_REQUEST['parkingSpace'];
    $id_registro = $_REQUEST['selectRegistros'];
    $estado = $_REQUEST['selectEstado'];
    $fecha_facturacion = $_REQUEST['fechaFacturacion'];
    $fecha_cancelacion = $_REQUEST['fechaCancelacion'];
    
    $facturadao->ingresarFactura($id_factura,$id_registro,$id_cliente,$placa,$plaza,$fecha_facturacion,$fecha_cancelacion,$estado);
    header("location:ingresar_factura.php?alert=succes");
?>