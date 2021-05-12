<?php require('databaseConductores.php');
session_start();

  if($_GET['id']){
      $id = mysqli_real_escape_string($conn,$_GET['id']);
      $consulta = "SELECT * FROM conductores WHERE id = '$id'";
      $resultado = mysqli_query($conn,$consulta);
      $fila = mysqli_fetch_array($resultado);

      if($fila['id'] != $id){
          header("Location: ../registroUsuario.html");
          session_destroy();

      }
  }
  
   if(isset($_POST['actualizarDatosDoc'])){
    $nuevoNombre = mysqli_real_escape_string($conn,$_POST['nombre']);
    $nuevoEmail = mysqli_real_escape_string($conn,$_POST['email']);
    $nuevoTelefono = mysqli_real_escape_string($conn,$_POST['telefono']);
    $nuevaEspecialidad = mysqli_real_escape_string($conn,$_POST['especialidad']);
    $nuevaIdentificacion = mysqli_real_escape_string($conn,$_POST['identificacion']);
    $nuevaTarjeta = mysqli_real_escape_string($conn,$_POST['tarjeta']);
    $nuevoContrasena = mysqli_real_escape_string($conn,$_POST['cambiarContrasena']);

    $sesion =   $_SESSION['conductor'];
    $comprobar = "SELECT * FROM conductores  WHERE mail = '$nuevoEmail' LIMIT 1";
    if($comprobar == 0){
       $tipoImagen = $_FILES['avatarMedico']['tmp_name'];
       $nombreImagen =$_FILES['avatarMedico']['name'];
       $urlNueva = "avatar/".$id.'_'.time().'jpg';

       if(is_uploaded_file($tipoImagen)){
         copy($tipoImagen,$urlNueva);
       }else{

       }
       $consulta = "UPDATE conductores SET nombre ='$nuevoNombre',email = '$nuevoEmail',telefono = '$nuevoTelefono',especialidad = '$nuevaEspecialidad',
       identificacion ='$nuevaIdentificacion', tarjeta_profesional = '$nuevaTarjeta',avatar_medico = '$urlNueva' WHERE id = '$id'";
       $ejecutar = mysqli_query($conn,$consulta);
       if($ejecutar){
         header("Location: ./editarPerfilDoc.php");
       }
    }
   
    echo mysqli_error($conn);
   }

?>
