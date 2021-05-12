<?php
require('database.php');
session_start();
if(!isset($_SESSION['usuario'])){
 header("Location: ../index.html");
 die();
 
}
$sesion =  $_SESSION['usuario'];
$consulta = "SELECT * FROM registros WHERE nombre ='$sesion' LIMIT 1  ";
$resultado = mysqli_query($conn,$consulta);
 if($resultado){
   if(mysqli_num_rows($resultado) > 0){
     while($fila = mysqli_fetch_array($resultado)){

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilosApp.css">
    <title>Accent |  <?php echo '@'. $_SESSION['usuario'] ?> </title>
</head>
<body class="cuerpo">
<header class="menu">
    <h2 class="logo"> Editar Perfil</h2>
    <div class="enlace_menu">
      <img src="<?php echo $fila['avatar_usuario'] ?>" alt="imagen perfil" class="imagenPerfilInicio">
      <img src="../img/menu.png" id="openNav" class="abrir_menu">
    </div>   
    <nav id="myNav" class="overlay overalyUsuario">  
      <a href="javascript:void(0)" class="closebtn" id="closeNav"><img src="../img/cerrar.png" alt=""></a>
      <div class="overlay-content">
        <ul>
          <li><a href="miPerfil.php">Inicio</a></li>
          <li><a href="">Sobre accent</a></li>
          <hr>
          <li><a href="">Configuracion</a></li>
          <li><a href="cerrarSesionUsuario.php">Desconectarse</a></li>
        </ul>
      </div>
    </nav>
  </header>
  
         <form action="actualizarDatosUsuario.php?id=<?php echo $fila['id']?>" class="container editarPerfil" enctype="multipart/form-data" method="POST">
         <div class="avatar">
           <img src="<?php echo $fila['avatar_usuario']?>" alt="avatar perfil" class="imagenAvatar">
           <br>
           <br>
           <div class="cambiarAvatar" id="nuevoAvatar">
               <input type="file" id="nuevaImagen" name="avatar" class="inputFoto" title="Elegir nueva imagen">
               <!-- Subir imagen -->
               <img src="../img/camara.png" alt="">
           </div>
        </div>
        <br>
        <label for="nombre">Nombre</label>
        <input type="text"  name="nombre" value="<?php echo $fila['nombre']?>" class="capturarDatos">
        <label for="email">Email</label>
        <input type="email"  name="email"  value="<?php echo $fila['email']?>" class="capturarDatos">
        <label for="telefono">Telefono</label>
        <input type="tel"  name="telefono"value="<?php echo $fila['telefono']?>" class="capturarDatos">
        <label for="telefono">Identificacion</label>
        <input type="tel"  name="documento"value="<?php echo $fila['documento']?>" class="capturarDatos">
        <label for="contrasena">Cambiar contrasena</label>
        <input type="password" name="cambiarContrasena" class="capturarDatos">
        <span>Si no quieres cambiar tu contraseña deja esto en blanco </span>
        <input type="submit" value="Actualizar datos" class="boton_incio-sesion" name="actualizarDatos">
      </div>

    <?php

   }
  }
}

?>
 </form>
 <br><br><br><br>
 <footer class="contenedor_footer">  
      <div class="footer">
        <h2 class="logo"> Accent Corp</h2> 
        <p>Contacto</p>
        <a href="">E-mail: Hola@accent-corp.com.co</a>
        <p>Direecion: Bogota Colombia</p>
        <p>Llamanos 322 760 3630</p>
      </div>
      <div class="footer">
        <p>Empresa</p>
        <a href="conocenos.html"> Que nos motiva</a>
        <a href="conocenos.html"> Nuestra Mision Y Vision</a>
      </div>
      <div class="footer">
        <p>Siguenos</p>
        <a href="">Facebook</a>
        <a href="">Twiter</a>
       <a href="">Instagram</a>
      </div>
    </footer>

    
  <script type="module" src="../App.js"></script>
</body>
</html>

