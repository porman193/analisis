<?php
require_once('../../controlador.php');
$id=$_SESSION['id'];
$nombre=$_REQUEST['nombre'];
$apellido=$_REQUEST['apellido'];
$telefono=$_REQUEST['telefono'];
$correo=$_REQUEST['correo'];

$tipo=$_SESSION['tipo'];
$concat="$tipo"."DAO";
$object = new $concat;
$object->actualizar_info($id,$nombre,$apellido,$telefono,$correo);
?>