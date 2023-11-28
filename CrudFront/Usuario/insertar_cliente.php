<?php
require_once('../../controlador.php');
$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];
$id=$_REQUEST['id'];
$nombre=$_REQUEST['nombre'];
$apellido=$_REQUEST['apellido'];
$telefono=$_REQUEST['telefono'];
$correo=$_REQUEST['correo'];
//echo "$user,$pass,$id,$nombre,$apellido,$telefono,$correo";
$clientedao->crear_cuenta($user,$pass,$id,$nombre,$apellido,$telefono,$correo);
?>