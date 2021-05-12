<?php
 require('databaseConductores.php');

  if(isset($_POST['emailSesionConductor']) && !empty($_POST['emailSesionConductor']) &&
          isset($_POST['contrasenaSesionConductor']) && !empty($_POST['contrasenaSesionConductor'])){
              $email =  mysqli_real_escape_string($conn,$_POST['emailSesionConductor']);
              $contrasena = mysqli_real_escape_string($conn,$_POST['contrasenaSesionConductor']);
            //   echo "los datos que recibi $email y la contraseña es $contrasena";

             $sql = "SELECT * FROM conductores WHERE  email = '$email'";
             $resultado = mysqli_query($conn,$sql);
             if(mysqli_num_rows($resultado) > 0){
                $fila = mysqli_fetch_assoc($resultado);
                if(password_verify($contrasena,$fila['contrasena'])){
                    session_start();
                    $_SESSION['medico'] = $fila['nombre'];
                  echo 'si';
                }else{
                    echo 'no';
                }
               
             }
            // echo mysqli_num_rows($resultado);
          

  }
  mysqli_close($conn);

 ?>
