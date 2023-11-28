<?php
require_once('../../controlador.php');
$nro_cuenta=$_REQUEST['nro_cuenta'];
$fondos=floatval($_REQUEST['fondos']);
$fondosadd=floatval($_REQUEST['fondosadd']);
$fondos+=$fondosadd;
$fondosdao->actualizar_fondos($nro_cuenta,$fondos);
?>