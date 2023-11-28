<!doctype html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-borderless/borderless.css" rel="stylesheet">
</head>
<body>
<?php
class ClienteDAO{
  public function crear_cuenta($user,$pass,$id,$nombre,$apellido,$telefono,$correo){
    $tipo="cliente";    
    $conex=Conexion::conexion();
    try {
        $conex->beginTransaction();
        $sql = "insert into usuario values (:user, :pass, :tipo)";
        $query = $conex->prepare($sql);
        $query->bindValue(':user', $user);
        $query->bindValue(':pass', $pass);
        $query->bindValue(':tipo', $tipo);
        $query->execute();
        $sql = "insert into cliente values (:id_cliente, :nombre, :apellido, :telefono, :correo, :user)";
        $query = $conex->prepare($sql);
        $query->bindValue(':id_cliente', $id);
        $query->bindValue(':nombre', $nombre);
        $query->bindValue(':apellido', $apellido);
        $query->bindValue(':telefono', $telefono);
        $query->bindValue(':correo', $correo);
        $query->bindValue(':user', $user);
        $query->execute();
        
        $conex->commit();
        session_destroy();
        echo "
          <script type='text/javascript'>
            Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text :  'Cuenta Creada Exitosamente Correctamente'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location='../../index.html';
                }
            });
          </script>
        ";
    } catch (PDOException $e) {
      session_start();
      $_SESSION['user_reg'] = $user;
      $_SESSION['id_reg'] = $id;
      $_SESSION['nombre_reg'] = $nombre;
      $_SESSION['apellido_reg'] = $apellido;
      $_SESSION['telefono_reg'] = $telefono;
      $_SESSION['correo_reg'] = $correo;
        $conex->rollBack();
        echo "Error al insertar el usuario y el cliente: " . $e->getMessage();
        echo "
          <script type='text/javascript'>
            Swal.fire({
              icon : 'error',
              title : 'Operacion Fallida!!',
              text :  'Error al insertar el usuario y el cliente'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location='../../registro_cliente.php';
                }
            });
          </script>
        ";
    }
}
    public function consultar_usuario($id){
      $conex=Conexion::conexion();
            $sql="select * from cliente where id_cliente='$id'";
            $query=$conex->prepare($sql);
            $query->execute();
            $user= $query->fetch(PDO::FETCH_ASSOC);
      return $user;
    }
    public function actualizar_info($id, $nombre, $apellido, $telefono, $correo) {
      $conex = Conexion::conexion();
      $sql = "update cliente set nombre=:nombre, apellido=:apellido, telefono=:telefono, correo=:correo where id_cliente=$id";
      $query = $conex->prepare($sql);
      $query->bindValue(':nombre', $nombre);
      $query->bindValue(':apellido', $apellido);
      $query->bindValue(':telefono', $telefono);
      $query->bindValue(':correo', $correo);
      $query->execute();
      echo "
        <script type='text/javascript'>
          Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text :  'Información Actualizada Correctamente'
          }).then((result) => {
              if(result.isConfirmed){
                  window.location='../../Home_Cliente.php';
              }
          });
        </script>
      ";
  }
    public function eliminar_cuenta($id, $user){
      $conex=Conexion::conexion();
      $sql = "delete from cliente where id_cliente = :id";
      $query = $conex->prepare($sql);
      $query->bindvalue(':id_cliente',$id);
      $query->execute();

      $sql = "delete from usuario where user = :user";
      $query = $conex->prepare($sql);
      $query->bindvalue(':user',$user);
      $query->execute();
      echo "
        <script type='text/javascript'>
          Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text :  'Cuenta Eliminada Correctamente'
          }).then((result) => {
              if(result.isConfirmed){
                  window.location='../../index.html';
              }
          });
        </script>
      ";
  }

  public function consultar_clientes(){
    $conex=Conexion::conexion();
    $sql="select * from cliente";
    $query=$conex->prepare($sql);
    $query->execute();
    $clientes= $query->fetchAll(PDO::FETCH_ASSOC);
    return $clientes;
  }
}
?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>

</html>