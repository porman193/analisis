<!doctype html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-borderless/borderless.css" rel="stylesheet">
</head>
<body>
<?php
class OperarioDAO{
    public function consultar_usuario($id){
      $conex=Conexion::conexion();
            $sql="select * from operario where id_operario='$id'";
            $query=$conex->prepare($sql);
            $query->execute();
            $user= $query->fetch(PDO::FETCH_ASSOC);
      return $user;
    }
    public function actualizar_info($id,$nombre,$apellido,$telefono,$correo){
      $conex=Conexion::conexion();
      $sql = "update operario set nombre=:nombre,apellido=:apellido,telefono=:telefono,correo=:correo where id_operario=$id";
      $query = $conex->prepare($sql);
      $query->bindValue(':nombre',$nombre);
      $query->bindValue(':apellido',$apellido);
      $query->bindValue(':telefono',$telefono);
      $query->bindValue(':correo',$correo);
      $query->execute();
      echo "
        <script type='text/javascript'>
          Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text :  'Información Actualizada Correctamente'
          }).then((result) => {
              if(result.isConfirmed){
                  window.location='../../Home_Operario.php';
              }
          });
        </script>
      ";
    }
}
?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>

</html>