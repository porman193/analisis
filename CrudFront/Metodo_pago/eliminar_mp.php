<?php
require_once('../../controlador.php');
$nro_tarjeta=$_REQUEST['nro_tarjeta'];
echo $nro_tarjeta;
$metodo_pagodao->eliminar_metodo_pago($nro_tarjeta);
?>