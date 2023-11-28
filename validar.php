<?php
require_once('controlador.php');
$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];
$login->validar($user,$pass);
?>