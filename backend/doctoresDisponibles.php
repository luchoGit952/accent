<?php 
require('database.php');
$consulta = "SELECT * FROM registros WHERE nombre = nombre LIMIT 1  ";
$resultado = mysqli_query($conn,$consulta);
$fila = mysqli_fetch_assoc($resultado);
// echo $fila['nombre'];

 ?> 


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../css/estilosApp.css">
    <title>Accent |  Doctores disponibles </title>
   

</head>
<body class="cuerpoDocDisponibles">
  <header class="menu ">
    <h2 class="logo"> Hola bienvenido <?php echo $fila['nombre'] ?></h2>
    <div class="enlace_menu">           
      <img src="<?php  echo $fila['avatar_usuario'];?>"  alt="imagen perfil" class="imagenPerfilInicio">
      <img src="../img/menu.png" id="openNav" class="abrir_menu">
    </div>   
    <nav id="myNav" class="overlay overalyUsuario">  
      <a href="javascript:void(0)" class="closebtn" id="closeNav"><img src="../img/cerrar.png" alt=""></a>
      <div class="overlay-content">
        <div class="contenedorPerfil">
          <img src="<?php echo $fila['avatar_usuario'];?>" alt="imagen Perfil Menu" class="imagenPerfilMenu">
          <p class="nombreUsuario"> <?php echo $fila['nombre']?> </p>
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
<h4 class="textoDocDisponibles">Doctores Disponibles el dia de hoy</h4>
<?php 
   require('databaseConductores.php');
  $consultaMedico = "SELECT * FROM conductores LIMIT 1";
  $resultadoMedico = mysqli_query($conn,$consultaMedico);
  while($filaMedico = mysqli_fetch_assoc($resultadoMedico)){ ?>
      <!-- echo $filaMedico['avatar_medico']; -->
 

   

<?php
    require('databaseConductores.php');
    $consulta2 = "SELECT  * FROM perfil_profesional LIMIT 1";
        $ejecutar = mysqli_query($conn,$consulta2);
    // $resultado = mysqli_fetch_assoc($ejecutar);
      while($fila2 = mysqli_fetch_assoc($ejecutar)){  ?>
     <section class="verDocDisponibles">
     <div class="mostrarDocDisponibles">
         <div class="disponibles">
             <img class="avatarPerfil" src="<?php echo $filaMedico['avatar_medico'] ?>" alt="">
            <p class="nombrePerfil"><?php echo 'DR(a).'.' '.$filaMedico['nombre']?></p>
            <br>
            <p class="nombreEspecialidad"><?php echo $filaMedico['especialidad']?></p>
            <br>
            <p class="descripcion__perfil__profesional">PERFIL PROFESIONAL</p>
            <p class="mostrar__perfil_profesional"><?php echo $fila2['PERFIL_PROFESIONAL']?></p>
            <br>
           <p class="descripcion__perfil__profesional">HABILIDADES</p>
           <p class="mostrar__perfil_profesional"><?php echo $fila2['HABILIDADES']?></p>
          </div>
          <div class="contenedor__valor__consulta">
            <p class="valor__consulta">Valor consulta $<?php echo $fila2 ['VALOR_CONSULTA']?></p>
            
          <div class="contenedor__calificacion">
           <span class="calificacion"><i class="far fa-star"></i>
           <i class="far fa-star"></i>
           <i class="far fa-star"></i>
           <i class="far fa-star"></i>
           <i class="far fa-star"></i>
          </span>
        </div>
        <br><br>
      </div>
      <span class="modo__atencion"><i class="fas fa-video"></i> Consulta en <?php echo $fila2 ['MODO_ATENCION']?></span>
    
     </div> 
     </section>

       

   <?php } ?> 
    
 <?php } ?>
 <script src="https://kit.fontawesome.com/5f3e6e66d9.js" crossorigin="anonymous"></script>
<script type="module" src="../App.js"></script>
</body>
</html>



