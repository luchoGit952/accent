<?php require('databaseConductores.php');
// session_start();
// if(isset($_SESSION['medico'])){
// }
$consulta  = "SELECT * FROM conductores WHERE email = email LIMIT 1";
$resultado = mysqli_query($conn,$consulta);
$fila = mysqli_fetch_assoc($resultado);
 
 ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilosApp.css">
    <title>Accent | <?php echo'@'.$fila['nombre']?></title>
</head>

<body class="bodyPerfilProfesional">
    <header class="menu ">
        <h2 class="logo"> Bienvenido Doctor <?php echo   $fila['nombre'] ?></h2>
        <div class="enlace_menu">
            <img src="<?php echo $fila['avatar_medico']?>" alt="imagen perfil" class="imagenPerfilInicio">
            <img src="../img/menu.png" id="openNav" class="abrir_menu">
        </div>
        <nav id="myNav" class="overlay overalyUsuario">
            <a href="javascript:void(0)" class="closebtn" id="closeNav"><img src="../img/cerrar.png" alt=""></a>
            <div class="overlay-content">
                <div class="contenedorPerfil">
                    <img src="<?php echo $fila['avatar_medico']?>" alt="imagen Perfil Menu" class="imagenPerfilMenu">
                    <p class="nombreUsuario"> <?php echo $fila['nombre']?> </p>
                    <span class="puntos">4.54 <img src="../img/puntos.png" alt="" class="puntosImagen"></span>
                </div>
                <ul>
                    <li><a href="perfilDoc.php">Inicio</a></li>
                    <li><a href="editarPerfilDoc.php">Editar perfil</a></li>
                    <hr>
                    <li><a href="que_ofrecemos.html">Sobre accent</a></li>
                    <li><a href="cerrarSesionConductor.php">Desconectarse</a></li>
                    <li><a href="#">Configuracion</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="efecto_ola" style="height: 350px; overflow: hidden;">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C147.57,189.95 271.49,-49.98 509.31,156.41 L512.69,-9.38 L0.00,0.00 Z"
                style="stroke: none; fill:#025041;">
            </path>
        </svg>
    </div>
    <div id="exito">
 </div>
    <div id="errorPerfilPro" >

    </div>
    <div class="content">
<h4 class="textoPerfilProfesional">Completa tu perfil profesional</h4>
<p class="parrafoPerfilPro"> <span>Recuerda</span>  que este perfil lo veran tus potenciales pacientes</p>
<div class="contact-wrapper">
    <div class="contact-form">
        <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" id="formPerfilProfesional">
           <div class="entradaPerfilPro">
               <input type="text"placeholder="Nombre"class="capturarEntradaPro" value="<?php echo  $fila['nombre'] ?>">
           </div>
           
           <div class="entradaPerfilPro">
               <input type="text"placeholder="Especialidad"class="capturarEntradaPro" value="<?php echo   $fila['especialidad']?>">
           </div>
          
           <div class="entradaPerfilPro">
              <textarea name="capturaUno" id="capturaUno"  rows="3" placeholder="Perfil Profesional"class="capturarCampoTexto" ></textarea>
           </div>
           <div class="entradaPerfilPro">
              <textarea name="capturaDos" id="capturaDos"  rows="3" placeholder="Habilidades" class="capturarCampoTexto"></textarea>
           </div>
           <div class="entradaPerfilPro">
               <input type="text"placeholder="Valor de tu consulta"class="capturarEntradaPro" name="valorConsulta">
           </div>
           <div class="entradaPerfilPro">
               <input type="text"placeholder="Modo de atencion eje,videollamadas"class="capturarEntradaPro" name="modoAtencion">
           </div>
           <div class="contenedorEnviarPerfilPro">
              <input type="submit" value="Hecho" class="enviarperfilPro" name="enviarperfilPro">
           </div>
        </form>
    </div>
    <div class="contact-info">
       <img src="../img/remoto.svg" alt="">
    </div>
</div>
</div>
<br><br>
    <script type="module" src="../app.js"></script>
</body>
</html>


 