<?php
require_once('../../controlador.php');
$nro_tarjeta=$_REQUEST['nro_tarjeta'];
$tipo=$_REQUEST['tipo'];
$titular=$_REQUEST['titular'];
$cvv=$_REQUEST['cvv'];
$fecha_vencimiento=$_REQUEST['fecha_vencimiento'];
$metodo_pagodao->actualizar_metodo_pago($nro_tarjeta,$tipo,$titular,$cvv,$fecha_vencimiento);
?>