<?php require('database.php');
session_start();

if(isset($_GET['id'])){
 $id = mysqli_real_escape_string($conn,$_GET['id']);
 $consulta = "SELECT * FROM  registros WHERE id = '$id' LIMIT 1";
 $resultado = mysqli_query($conn,$consulta);
 $fila = mysqli_fetch_array($resultado);

 if($fila['id'] != $id) {
 header("Location: ../registroUsuario.html");
 session_destroy();
 }

}

if(isset($_POST['actualizarDatos'])){
 $nuevoNombre = mysqli_real_escape_string($conn,$_POST['nombre']);
 $nuevoEmail =  mysqli_real_escape_string($conn,$_POST['email']);
 $NuevoTelefono = mysqli_real_escape_string($conn,$_POST['telefono']);
 $NuevoDocumento = mysqli_real_escape_string($conn,$_POST['documento']);
 $nuevaContrasena = mysqli_real_escape_string($conn,$_POST['cambiarContrasena']);

 $sesion =  $_SESSION['usuario'];
$cmprobar = "SELECT * FROM  registros WHERE email = '$nuevoEmail' LIMIT 1";

 if($cmprobar == 0){
     $tmpImagen = $_FILES['avatar']['tmp_name'];
     $nombreImagen = $_FILES['avatar']['name'];
      $urlNueva ="avatar/".$id.'_'.time().'jpg';
     
      if(is_uploaded_file($tmpImagen)){
      //  $destino = $nombre;
      //  $nombreAvatar  = $;
        copy($tmpImagen,$urlNueva);
      }else{
          $nombreAvatar = $fila['avatar_usuario'];
      }

      $sql = "UPDATE registros SET nombre = '$nuevoNombre', email = '$nuevoEmail',telefono = '$NuevoTelefono', avatar_usuario = ' $urlNueva 'WHERE id = '$id' ";
      $ejecutar = mysqli_query($conn,$sql);
      if($ejecutar){
        header("Location: ./editarPerfilUsuario.php");
      }
 }else{
     echo "El email ya esta en uso";
 }
 



echo mysqli_error($conn);

}


?>