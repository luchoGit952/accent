<?php
require 'databaseConductores.php';
$email = $_GET['email'];
$token = $_GET['token'];


$consulta = "SELECT  clave_nueva FROM recuperador_conductor WHERE email = '$email'  AND token = '$token'  LIMIT 1";
$consulta = mysqli_query($conn,$consulta);
$fila = mysqli_fetch_assoc($consulta);
if(!$fila){
    header("Location: ../registroConductor.html");
    die();
}


$clave = password_hash($fila['clave_nueva'],PASSWORD_DEFAULT); 
$consulta2 = "UPDATE conductores SET  contrasena = '$clave' WHERE email = '$email' LIMIT 1 ";
mysqli_query($conn,$consulta2);

// // ELIMINANDO LOS DATOS DE RECUPERACION
$consulta3 = "DELETE FROM recuperador_conductor WHERE email = '$email' LIMIT 1 ";
mysqli_query($conn,$consulta3);

echo 'Tu contraseña se actualizo con exito';



?>