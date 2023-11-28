<?php
    require_once('Conexion.php');
    class VehiculosDao{
        public function consultar_autos(){
            $conex=Conexion::conexion();
            $sql = "select * from vehiculo";
            $query = $conex->prepare($sql);
            $query->execute();
            $autos = $query->fetchAll(PDO::FETCH_ASSOC);
            return $autos;
        }  
    }
?>