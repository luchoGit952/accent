<?php
require('database.php');
      
      function limpiarEntradasUsuarios($data){
         $data = trim($data);
         $data = htmlspecialchars($data);
         $data = stripslashes($data);
         return $data;
      }
   
       // VERIFICANDO QUE EL CORREO NO SE REPITA
     $email = limpiarEntradasUsuarios($_POST['emailUsuario']);
     $verificarEmail = mysqli_query($conn, "SELECT * FROM registros WHERE email = '$email' ");
     if(mysqli_num_rows($verificarEmail) > 0){
       echo json_encode(400);
     exit();
      
     }
      
      if(isset($_POST['nombreUsuario']) &&  !empty($_POST['nombreUsuario']) && 
     isset($_POST['emailUsuario']) && !empty($_POST['emailUsuario']) &&
     isset($_POST['telefonoUsuario']) && !empty($_POST['telefonoUsuario']) &&
      isset($_POST['contraseñaUsuario']) && !empty($_POST['contraseñaUsuario']) &&
       isset($_POST['cedulaUsuario']) && !empty($_POST['cedulaUsuario'])){
      
         $nombre = limpiarEntradasUsuarios($_POST['nombreUsuario']);
         filter_var($nombre, FILTER_SANITIZE_STRING);
         $email = limpiarEntradasUsuarios($_POST['emailUsuario']);
         $email = filter_var($email,FILTER_SANITIZE_EMAIL);
        filter_var($email,FILTER_VALIDATE_EMAIL);
   
         $telefono = limpiarEntradasUsuarios($_POST['telefonoUsuario']);
         filter_var($telefono,FILTER_VALIDATE_INT);
          $contraseña = limpiarEntradasUsuarios(password_hash($_POST['contraseñaUsuario'], PASSWORD_DEFAULT));
         // $contraseña = limpiarEntradasUsuarios($_POST['contraseñaUsuario']);

         $documento = limpiarEntradasUsuarios($_POST['cedulaUsuario']);
         filter_var($documento,FILTER_VALIDATE_INT);

      
      $sql = "INSERT INTO registros (nombre,email, telefono,documento,contrasena ) VALUES ('$nombre','$email','$telefono','$documento','$contraseña')";  
     $resultado = mysqli_query($conn,$sql);
  
   // if($resultado){
   //    echo "New record created successfully";
   // }else{
   //    echo "Error: " .  "<br>" . mysqli_error($conn);
   // }
       echo 'ok';
      }else{

         echo 'error';
      }


       mysqli_close($conn);


?>