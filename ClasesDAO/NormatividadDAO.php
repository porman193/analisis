<?php
require_once('Conexion.php');
class NormatividadDAO{
    public function consultar_lista(){
        $conex=Conexion::conexion();
        $sql = "select * from normatividad";
        $query = $conex->prepare($sql);
        $query->execute();
        $normas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $normas;
    }
    public function ver_norma($id){
        $conex=Conexion::conexion();
        $sql = "select * from normatividad where id_norma='$id'";
        $query = $conex->prepare($sql);
        $query->execute();
        $normas = $query->fetch(PDO::FETCH_ASSOC);
        return $normas;
    }
}
?>