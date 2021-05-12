<?php require('database.php');
  
 
     //   INICIO DE SESION
       
       if(isset($_POST['email_sesion'])  && !empty($_POST['email_sesion']) &&
       isset($_POST['contrasena_sesion']) && !empty($_POST['contrasena_sesion'])){
          
          $emailSesion = mysqli_real_escape_string($conn,$_POST['email_sesion']) ;
           $contrasenaSesion = mysqli_real_escape_string($conn,$_POST['contrasena_sesion']);
          // $contrasenaSesion  = password_hash($_POST['contrasena_sesion'],PASSWORD_DEFAULT);

          $sql = "SELECT * FROM registros WHERE email ='$emailSesion'  ";
        $resultado = mysqli_query($conn,$sql);
        if(mysqli_num_rows($resultado) > 0){
          $fila = mysqli_fetch_assoc($resultado);
          if(password_verify($contrasenaSesion,$fila['contrasena'])){
            session_start();  
            $_SESSION['usuario'] = $fila['nombre'];  
            echo 'existe';
          }else{
            echo 'no existe';

          }
        
        }
       
      // if($resultado == true){
      //   $fila = mysqli_fetch_assoc($resultado);
      //   if(password_verify($contrasenaSesion,$fila['contrasena'])){
      //      $respuesta = array('respuesta' => 'true');
      //   }else{
      //     $respuesta = array('respuesta' => 'false');
      //   }
      //  } 
      //  echo json_encode($respuesta);
      }

      
   mysqli_close($conn);
?>