<?php
require_once('../../controlador.php');
$id_registro_salida=$_REQUEST['id_registro_salida'];
$id_registro=$_REQUEST['id_registro'];
$fecha_salida=$_REQUEST['fecha_salida'];
$registro_vehiculodao->guardar_registro_salida($id_registro_salida,$id_registro,$fecha_salida);
if ($registro_vehiculodao) {
    // Redirigir a una página de éxito o mostrar un mensaje
    header("Location: ../../home_Operario.php");
    exit();
} 
?>