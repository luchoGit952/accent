 <?php
      require('database.php');
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      
      require 'Exception.php';
      require 'PHPMailer.php';
      require 'SMTP.php';

 
   //   RECUPERADOR DE CONTRASEÑAS
 if(isset($_POST['recuperarContraseña']) && !empty($_POST['recuperarContraseña'])){
    $emailRecuperarContrasena = mysqli_real_escape_string($conn,$_POST['recuperarContraseña']);
   //  echo json_encode($recuperarContraseña);
    $recuperar = mysqli_query($conn ,"SELECT nombre, email FROM registros WHERE email = '$emailRecuperarContrasena' ");
    $fila = mysqli_fetch_array($recuperar);
    if(mysqli_num_rows($recuperar) > 0){ 
      require('database.php');
       $nuevaContrasena = rand(10000000,99999999);
       $token = md5( time().rand(1000, 9999));
       $consulta2 = "INSERT INTO recuperador SET email = '$emailRecuperarContrasena', token = '$token', clave_nueva = '$nuevaContrasena' ";
        $resultado = mysqli_query($conn,$consulta2);
        
       $link = "http://localhost/ACCENT/src/backend/confirmarUsuario.php?email=$emailRecuperarContrasena&token=$token";
       echo $token;
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
    $mail->addAddress($_POST['recuperarContraseña']);     //Add a recipient
                             
 
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
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