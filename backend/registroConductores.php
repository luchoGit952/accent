<?php
require('databaseConductores.php');

        function limpiarEntradas($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
       
       // VERIFICANDO QUE EL CORREO NO SE REPITA
       $email = limpiarEntradas($_POST['emailConductor']);
       $verificarEamil= mysqli_query($conn, "SELECT * FROM conductores WHERE email = '$email' ");
       if(mysqli_num_rows($verificarEamil) > 0){
         echo json_encode(400);
         exit();
       }

        if(isset($_POST['nombreCondutor']) &&  !empty($_POST['nombreCondutor']) && 
        isset($_POST['emailConductor']) && !empty($_POST['emailConductor']) &&
        isset($_POST['telefonoConductor']) && !empty($_POST['telefonoConductor']) &&
        isset($_POST['especialidad']) && !empty($_POST['especialidad']) &&
        isset($_POST['identificacion']) && !empty($_POST['identificacion']) &&
        isset($_POST['tarjeta']) && !empty($_POST['tarjeta']) &&
        isset($_POST['contraseñaCondutor']) && !empty($_POST['contraseñaCondutor'])){
                                                           
         $nombre = limpiarEntradas($_POST['nombreCondutor']); 
          filter_var($nombre, FILTER_SANITIZE_STRING);

          $email = limpiarEntradas($_POST['emailConductor']);
          $email = filter_var($email,FILTER_SANITIZE_EMAIL);
          filter_var($email,FILTER_VALIDATE_EMAIL);

          $telefono =limpiarEntradas($_POST['telefonoConductor']);
          filter_var($telefono,FILTER_VALIDATE_INT);

          $especialidad = limpiarEntradas($_POST['especialidad']);
          filter_var($especialidad,FILTER_SANITIZE_STRING);

          $identificacion = limpiarEntradas($_POST['identificacion']);
          filter_var($identificacion,FILTER_VALIDATE_INT);

          $tarjeta = limpiarEntradas($_POST['tarjeta']);
          filter_var($tarjeta,FILTER_VALIDATE_INT);
          $contraseña = limpiarEntradas(password_hash($_POST['contraseñaCondutor'],PASSWORD_DEFAULT));
          

      $sql = "INSERT INTO conductores (nombre,email, telefono,especialidad,	identificacion,tarjeta_profesional, contrasena )  VALUES ('$nombre', '$email', '$telefono', '$especialidad','$identificacion','$tarjeta', '$contraseña')";
      $resultado = mysqli_query($conn,$sql);
   
  //  if($resultado){
  //     echo "New record created successfully";
  //  }else{
  //     echo "Error: " .  "<br>" . mysqli_error($conn);
  //  }
     echo 'exito';
    }else{
      echo 'error';
    }
  mysqli_close($conn);

?>