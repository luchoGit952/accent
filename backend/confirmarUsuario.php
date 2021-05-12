<?php

require('database.php');
$email = $_GET['email'];
$token = $_GET['token'];

 $consulta = "SELECT  clave_nueva FROM recuperador WHERE email = '$email'  AND token = '$token'  LIMIT 1";
 $resultado  = mysqli_query($conn,$consulta);
 $fila = mysqli_fetch_assoc($resultado);
 if(!$fila){
     header("Location: ../registroUsuario.html");
  die();
}

$clave = password_hash($fila['clave_nueva'],PASSWORD_DEFAULT); 
$consulta2 = "UPDATE  registros SET  contrasena = '$clave' WHERE email = '$email' LIMIT 1 ";
mysqli_query($conn,$consulta2);


// ELIMINANDO LOS DATOS DE RECUPERACION
$consulta3 = "DELETE FROM recuperador WHERE email = '$email' LIMIT 1 ";
mysqli_query($conn,$consulta3);

echo 'Tu contraseña se actualizo con exito';
