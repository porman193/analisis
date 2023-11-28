<?php
require_once('../../controlador.php');
$id_registro= isset($_POST['id_registro']) ? $_POST['id_registro'] : null;
$placa = isset($_POST['placa']) ? $_POST['placa'] : null;
$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : null;
$id_operario = isset($_POST['id_operario']) ? $_POST['id_operario'] : null;
$id_plaza = isset($_POST['id_plaza']) ? $_POST['id_plaza'] : null;
$fecha_ingreso = isset($_POST['fecha_ingreso']) ? $_POST['fecha_ingreso'] : null;
$fecha_salida = isset($_POST['fecha_salida']) ? $_POST['fecha_salida'] : null;
$registro_vehiculodao->actualizar_registro($id_registro,$placa,$id_cliente,$id_operario,$id_plaza,$fecha_ingreso,$fecha_salida);
?>