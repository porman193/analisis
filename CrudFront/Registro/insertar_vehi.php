<?php
require_once('../../controlador.php');
$id_registro=$_REQUEST['id_registro'];
$placa=$_REQUEST['placa'];
$id_cliente=$_REQUEST['id_cliente'];
$id_operario=$_REQUEST['id_operario'];
$id_plaza=$_REQUEST['id_plaza'];
$fecha_ingreso=$_REQUEST['fecha_ingreso'];
$fecha_salida=$_REQUEST['fecha_salida'];
$registro_vehiculodao->guardar_registro($id_registro,$placa,$id_cliente,$id_operario,$id_plaza,$fecha_ingreso,$fecha_salida);
if ($registro_vehiculodao) {
    // Redirigir a una página de éxito o mostrar un mensaje
    header("Location: registro_vehiculos.php");
    exit();
} 
?>