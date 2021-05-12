<?php require('databaseConductores.php');

  if(isset($_POST['capturaUno']) && !empty($_POST['capturaUno']) &&
    isset($_POST['capturaDos'])&& !empty($_POST['capturaDos']) &&
    isset($_POST['valorConsulta']) && !empty($_POST['valorConsulta']) &&
    isset($_POST['modoAtencion']) && !empty($_POST['modoAtencion'])){

   $capturaUno = mysqli_real_escape_string($conn,$_POST['capturaUno']);
   $capturaDos = mysqli_real_escape_string($conn,$_POST['capturaDos']);
   $valorConsulta = mysqli_real_escape_string($conn,$_POST['valorConsulta']);
   $modoAtencion = mysqli_real_escape_string($conn,$_POST['modoAtencion']);

 $insertar = "INSERT INTO perfil_profesional(PERFIL_PROFESIONAL,HABILIDADES,VALOR_CONSULTA,MODO_ATENCION) VALUES('$capturaUno ','$capturaDos','$valorConsulta','$modoAtencion')";
 $ejecutar = mysqli_query($conn,$insertar);
 if($ejecutar){
   echo 'exito';
 }else{
     echo 'error';
 }
   

  }
  mysqli_close($conn);
?>