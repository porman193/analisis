<?php
require_once('Conexion.php');
class PlazasDAO{
    public function consultar_plazas(){
        $conex=Conexion::conexion();
        $sql = "select * from plazas";
        $query = $conex->prepare($sql);
        $query->execute();
        $plazas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $plazas;
    }
}
?>