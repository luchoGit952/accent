<?php
require 'databaseConductores.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';

if(isset($_POST['recuperarContrasenaConductor']) && !empty($_POST['recuperarContrasenaConductor'])){
   $emailRecuperarContrasena = mysqli_real_escape_string($conn,$_POST['recuperarContrasenaConductor']);
  $recuperar = mysqli_query($conn,"SELECT email,nombre FROM conductores WHERE email = '$emailRecuperarContrasena' ");
  $fila = mysqli_fetch_array($recuperar);
  if(mysqli_num_rows($recuperar) > 0){
    require 'databaseConductores.php';
    $nuevaContrasena = rand(10000000,99999999);
    $token = md5( time().rand(1000, 9999));
    $consulta = "INSERT INTO recuperador_conductor SET email = '$emailRecuperarContrasena', token = '$token', clave_nueva = '$nuevaContrasena' ";
    $resultado = mysqli_query($conn,$consulta);
    $link = "http://localhost/ACCENT/src/backend/confirmarConductor.php?email=$emailRecuperarContrasena&token=$token";
    echo json_encode(200);
    $mail = new PHPMailer(true);

    try {
        //Server settings
       //   $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
                        
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'luisrbn10@outlook.es';                     //SMTP username
        $mail->Password   = 'LR3227603630';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('luisrbn10@outlook.es', 'Accent');
        $mail->addAddress($_POST['recuperarContrasenaConductor']);     //Add a recipient
                                
    
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject =  'Has solicitado el cambio de tu contrasena ';
        $mail->Body    = $fila['nombre'] ." " ."El sitema te ha generado una contrasena la cual es  $nuevaContrasena  </b> pero 
               antes debemos asegurarnos de que fuiste tu quien solicito el cambio de su contrasena </b> <a href='$link'>Pulsa aqui</a>
               si no fuiste tu ignora este mensaje ";
       
      
      
      
       $mail->send();
    
          echo 'hemos  enviado un mensaje a tu correo electronico';
       
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }else{
    
      echo json_encode(400);
  }
}


mysqli_close($conn);

?>