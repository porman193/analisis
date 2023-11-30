<?php
   require_once('Conexion.php');
   class RegistrosDao{
        public function update_registro($placa,$id_cliente,$id_operario,$plaza){
            $conex = Conexion::conexion();
            $sql = "UPDATE registro SET fecha_salida=?,id_cliente= ?,id_operario= ?,id_plaza= ? WHERE placa=?";
            $timezone = $_COOKIE['timezone'] ?? 'UTC';
            date_default_timezone_set($timezone);
            $currentDate = date('Y-m-d H:i:s');
            $query = $conex->prepare($sql);
            $query->execute([$currentDate,$id_cliente,$id_operario,$plaza,$placa]);
        }
        public function guardar_registro($id_cliente,$placa,$plaza,$id_operario){
            $timezone = $_COOKIE['timezone'] ?? 'UTC';
            $id_registro=rand(1, 100);
            date_default_timezone_set($timezone);
            $currentDate = date('Y-m-d H:i:s');
            $conex=Conexion::conexion();
            $sql = "INSERT INTO registro (id_registro,placa, id_cliente, id_operario, id_plaza, fecha_ingreso, fecha_salida) VALUES (?,?, ?, ?, ?, ?, ?)";
            $query = $conex->prepare($sql);
            $query->execute([$id_registro,$placa, $id_cliente, $id_operario, $plaza, $currentDate,$currentDate]);
        }

        public function consultar_registros(){
            $conex=Conexion::conexion();
            $sql = "SELECT * FROM registro";
            $query = $conex->prepare($sql);
            $query->execute();
            $registros = $query->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        }

        public function eliminar_registro($placa){
            $conex=Conexion::conexion();
            $sql = "DELETE FROM registro WHERE placa=?";
            $query = $conex->prepare($sql);
            $query->execute([$placa]);
        }

        public function consultar_registros_por_fecha($fechaInicio, $fechaFin){
            $conex=Conexion::conexion();
            $sql = "SELECT * FROM registro WHERE fecha_ingreso BETWEEN ? AND ?";
            $query = $conex->prepare($sql);
            $query->execute([$fechaInicio, $fechaFin]);
            $registros = $query->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        }
   }
?>