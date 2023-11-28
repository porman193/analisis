<?php
    require_once('../../controlador.php');
    $placa=$_REQUEST['form-select-car'];
    $id_cliente=$_REQUEST['form-select_client'];
    $plaza=$_REQUEST['parkingSpace'];
    $id_operario=$_SESSION['id'];

    if(isset($_POST["update"])){
        $registrodao->update_registro($placa,$id_cliente,$id_operario,$plaza);
        header("location:asignar_plazas.php?alert=update");
    }else{
        $registrodao->guardar_registro($id_cliente,$placa,$plaza,$id_operario);
        header("location:asignar_plazas.php?alert=succes");
    }
  ;
?>