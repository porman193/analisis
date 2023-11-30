<?php
class Conexion{
    static public function conexion(){
        try {
            $dsn = "mysql:host=localhost;dbname=parqueadero;port=3306";
            $usuario = "root";
            $password = "";
            $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $conex = new PDO($dsn,$usuario,$password,$opt);
            
            return $conex;
        
        } catch (PDOException $error) {
            echo "<h2>Error al conectar con la Base de Datos...<br></h2>".$error->getMessage();
            exit;
        }
    }


}
