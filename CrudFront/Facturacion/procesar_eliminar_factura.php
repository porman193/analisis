<?php
 require_once('../../controlador.php');
    $id_factura=$_REQUEST['form-select-factura'];
    $facturadao->eliminar_factura($id_factura);
    header("location:eliminar_factura.php?alert=delete");
?>