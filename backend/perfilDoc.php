<?php require('databaseConductores.php');
session_start();

if(!isset($_SESSION['medico'])){
    header("Location: ../registroConductor.html");
    die();
}
$consulta  = "SELECT avatar_medico FROM conductores WHERE email = email";
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
    <title>Accent |   <?php echo'@'.$_SESSION['medico']?></title>
</head>
<body>
<header class="menu ">
    <h2 class="logo"> Bienvenido Doctor <?php echo   $_SESSION['medico'] ?></h2>
    <div class="enlace_menu">
     <img src="<?php echo $fila['avatar_medico']?>"  alt="imagen perfil" class="imagenPerfilInicio">
      <img src="../img/menu.png" id="openNav" class="abrir_menu">
    </div>
    <nav id="myNav" class="overlay overalyUsuario">
      <a href="javascript:void(0)" class="closebtn" id="closeNav"><img src="../img/cerrar.png" alt=""></a>
      <div class="overlay-content">
      <div class="contenedorPerfil">
          <img src="<?php echo $fila['avatar_medico']?>" alt="imagen Perfil Menu" class="imagenPerfilMenu">
          <p class="nombreUsuario"> <?php echo $_SESSION['medico']?> </p>
          <span class="puntos">4.54 <img src="../img/puntos.png" alt=""class="puntosImagen" ></span>
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
  <div class="efecto_ola" style="height: 350px; overflow: hidden;" >
   <svg viewBox="0 0 500 150" preserveAspectRatio="none"
    style="height: 100%; width: 100%;">
    <path d="M0.00,49.98 C147.57,189.95 271.49,-49.98 509.31,156.41 L512.69,-9.38 L0.00,0.00 Z" 
    style="stroke: none; fill:#025041;">
  </path>
</svg>
</div>
  <section class="seccion_perfil">
  <h2 class="titulo_perfil">Hola bienvenido Doctor <?php echo $_SESSION['medico']?>,  es un gusto verte de nuevo</h2>
      <a href="perfilProfesional.php" class="enlace_medicos"><div class="contenido_perfil">Crear  perfil profesional</div></a>
        <a href="" class="enlace_medicos"> <div class="contenido_perfil">Ver tus citas hoy</div></a>
        <a href="../agendaDoc.html" class="enlace_medicos"><div class="contenido_perfil">Organiza tu agenda </div></a>
     
   </section>
  <script type="module" src="../App.js"></script>
</body>
</html>