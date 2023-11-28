<!doctype html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-borderless/borderless.css" rel="stylesheet">
</head>
<body>
<?php
require_once ('Conexion.php');
class registrar_vehiculoDAO{
    
    public function consultar_registro(){
        $conex=Conexion::conexion();
        $sql = "SELECT * FROM registro";
        $query = $conex->prepare($sql);
        $query->execute();
        $registros = $query->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }
    public function consultar_registro_salidas(){
        $conex=Conexion::conexion();
        $sql = "SELECT * FROM registro_salidas";
        $query = $conex->prepare($sql);
        $query->execute();
        $salidas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $salidas;
    }

    public function obtener_registro($id_registro){
        $conex=Conexion::conexion();
        $sql = "SELECT * FROM registro where id_registro = :id_registro";
        $query = $conex->prepare($sql);
        $query->bindvalue(':id_registro',$id_registro);
        $query->execute();
        $vehiculos = $query->fetch(PDO::FETCH_ASSOC);
        return $vehiculos;
    }
    
    public function guardar_registro($id_registro,$placa,$id_cliente,$id_operario,$id_plaza,$fecha_ingreso,$fecha_salida){
        $conex=Conexion::conexion(); 
        $sql = "INSERT INTO registro (id_registro,placa,id_cliente,id_operario,id_plaza,fecha_ingreso,fecha_salida) VALUES ( ? , ? , ? , ? , ? , ? , ? )";
        $query = $conex->prepare($sql);
        $query->execute([$id_registro,$placa,$id_cliente,$id_operario,$id_plaza,$fecha_ingreso,$fecha_salida]);
    }
    
    public function guardar_registro_salida($id_registro_salida,$id_registro,$fecha_salida){
        $conex=Conexion::conexion(); 
        $sql = "INSERT INTO registro_salidas (id_registro_salida,id_registro,fecha_salida) VALUES ( ? , ? , ? )";
        $query = $conex->prepare($sql);
        $query->execute([$id_registro_salida,$id_registro,$fecha_salida]);
    }

    public function eliminar_registro($id_registro){
        $conex=Conexion::conexion();
        $sql = "DELETE FROM registro WHERE id_registro = :id_registro";
        $query = $conex->prepare($sql);
        $query->bindvalue(':id_registro',$id_registro);
        $query->execute();
        echo "
            <script type='text/javascript'>
            Swal.fire({
                icon : 'success',
                title : 'Operacion Exitosa!!',
                text :  'vehiculo Eliminado Correctamente'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location='./registro_vehiculos.php';
                }
            });
            </script>
        ";
    }

    public function actualizar_registro($id_registro,$placa,$id_cliente,$id_operario,$id_plaza,$fecha_ingreso,$fecha_salida){
        $conex=Conexion::conexion();
        $sql = "UPDATE registro SET placa=:placa,id_cliente=:id_cliente,id_operario=:id_operario,id_plaza=:id_plaza, fecha_ingreso=:fecha_ingreso,fecha_salida=:fecha_salida where id_registro= :id_registro";
        $query = $conex->prepare($sql);
        $query->bindValue(':placa', $placa);
        $query->bindValue(':id_cliente',$id_cliente);
        $query->bindValue(':id_operario',$id_operario);
        $query->bindValue(':id_plaza',$id_plaza);
        $query->bindValue(':fecha_ingreso',$fecha_ingreso);
        $query->bindValue(':fecha_salida',$fecha_salida);
        $query->bindValue(':id_registro', $id_registro);
        $query->execute();
        echo "
            <script type='text/javascript'>
            Swal.fire({
                icon : 'success',
                title : 'Operacion Exitosa!!',
                text :  'Vehiculo Actualizado Correctamente'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location='./registro_vehiculos.php';
                }
            });
            </script>
        ";
      }

                    
}