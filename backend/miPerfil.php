<?php
require('database.php');
 session_start();
 $sesion = $_SESSION['usuario'];
  if(!$_SESSION['usuario']){
      header('Location: ../index.html');
      die();
  }else{
 
$consulta = "SELECT * FROM registros WHERE nombre = '$sesion' LIMIT 1  ";
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
    <title>Accent |  <?php echo '@'.$_SESSION['usuario'] ?> </title>
   

</head>
<body>
  <header class="menu ">
    <h2 class="logo"> Hola bienvenido <?php echo $_SESSION['usuario'] ?></h2>
    <div class="enlace_menu">           
      <img src="<?php  echo $fila['avatar_usuario'];?>"  alt="imagen perfil" class="imagenPerfilInicio">
      <img src="../img/menu.png" id="openNav" class="abrir_menu">
    </div>   
    <nav id="myNav" class="overlay overalyUsuario">  
      <a href="javascript:void(0)" class="closebtn" id="closeNav"><img src="../img/cerrar.png" alt=""></a>
      <div class="overlay-content">
        <div class="contenedorPerfil">
          <img src="<?php echo $fila['avatar_usuario'];?>" alt="imagen Perfil Menu" class="imagenPerfilMenu">
          <p class="nombreUsuario"> <?php echo $_SESSION['usuario']?> </p>
          <span class="puntos">4.54 <img src="../img/puntos.png" alt=""class="puntosImagen" ></span>
        </div>
   
        <div class="contenedorEnlacesUsuario">
         <ul>
           <li><a href="miPerfil.php">Inicio</a></li>
           <li><a href="editarPerfilUsuario.php">Editar perfil</a></li>
           <hr>
           <li><a href="../conocenos.html">Sobre accent</a></li>
           <li><a href="cerrarSesionUsuario.php">Desconectarse</a></li>
           <li><a href="">Configuracion</a></li>
         </ul>

       </div>
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
  <h2 class="titulo_perfil">Hola bienvenido <?php echo $_SESSION['usuario']?>,  es un gusto verte de nuevo</h2>
      <a href="" class="enlace_medicos"><div class="contenido_perfil">Solicitar consulta <i class="fas fa-calendar-alt"></i></div></a>
   
        <a href="doctoresDisponibles.php" class="enlace_medicos"> <div class="contenido_perfil">Doc disponibles <i class="fas fa-user-md"></i></div></a>
      
        <a href="" class="enlace_medicos"><div class="contenido_perfil">Especialistas <i class="fas fa-briefcase-medical"></i></div></a>
     
   </section>

  <script type="module" src="../App.js"></script>
  <script src="https://kit.fontawesome.com/5f3e6e66d9.js" crossorigin="anonymous"></script> 
</body>
</html>
 <?php } ?>
