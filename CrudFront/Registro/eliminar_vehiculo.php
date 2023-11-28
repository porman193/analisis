<?php
require_once('../../controlador.php');
$id_registro=$_REQUEST['id_registro'];
$registro_vehiculodao->eliminar_registro($id_registro);
?>