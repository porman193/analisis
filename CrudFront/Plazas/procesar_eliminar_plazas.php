<?php
 
    require_once('../../controlador.php');
    $placa=$_REQUEST['form-select-car'];
    $registrodao->eliminar_registro($placa);
    header("location:eliminar_plazas.php?alert=delete");
?>