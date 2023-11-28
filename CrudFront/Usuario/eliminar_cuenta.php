<?php
require_once('../../controlador.php');
$id=$_SESSION['id'];
$clientedao->eliminar_cuenta($id);
?>