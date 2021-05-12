 <?php  require('databaseConductores.php');

 session_start();
 if(isset($_SESSION['conductor'])){
   $session = $_SESSION['conductor'];
}

$consulta = "SELECT * FROM conductores WHERE email = email LIMIT 1 ";
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
    <title>Accent | <?php echo'@'.$fila['nombre']?></title>
</head>
<body class="cuerpo">
<header class="menu ">
    <h2 class="logo"> Editar Perfil</h2>
    <div class="enlace_menu">
      <img src="<?php echo $fila['avatar_medico']?>" alt="imagen perfil" class="imagenPerfilInicio">
      <img src="../img/menu.png" id="openNav" class="abrir_menu">
    </div>   
    <nav id="myNav" class="overlay overalyUsuario">  
      <a href="javascript:void(0)" class="closebtn" id="closeNav"><img src="../img/cerrar.png" alt=""></a>
      <div class="overlay-content">
        <ul>
          <li><a href="PerfilDoc.php">Inicio</a></li>
          <li><a href="">Sobre accent</a></li>
          <hr>
          <li><a href="">Configuracion</a></li>
          <li><a href="cerrarSesionUsuario.php">Desconectarse</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <form action="actualizarDatosDoc.php?id=<?php echo $fila['id']?>" class="container editarPerfil" enctype="multipart/form-data" method="POST">
       <div class="avatar">
           <img src="<?php echo $fila['avatar_medico']?>" alt="avatar perfil" class="imagenAvatar">
           <br>
           <br>
           <div class="cambiarAvatar" id="nuevoAvatar">
               <input type="file" id="nuevaImagen" name="avatarMedico" class="inputFoto" title="Elegir nueva imagen">
               <!-- Subir imagen -->
               <img src="../img/camara.png" alt="">
           </div>
        </div>
        <br>
        <label for="nombre">Nombre</label>
        <input type="text"  name="nombre" value="<?php  echo $fila['nombre'] ?>" class="capturarDatos">
        <label for="email">Email</label>
        <input type="email"  name="email"  value="<?php  echo $fila['email'] ?>" class="capturarDatos">
        <label for="telefono">Telefono</label>
        <input type="tel"  name="telefono"value="<?php  echo $fila['telefono'] ?>"class="capturarDatos">
        <label for="especialidad">Especialidad</label>
        <input type="text"  name="especialidad"value="<?php  echo $fila['especialidad'] ?>"class="capturarDatos">
        <label for="identificacion">Identificacion</label>
        <input type="text"  name="identificacion"value="<?php  echo $fila['identificacion'] ?>"class="capturarDatos">
        <label for="tarjeta">Tarjeta Profesional</label>
        <input type="text"  name="tarjeta"value="<?php  echo $fila['tarjeta_profesional'] ?>"class="capturarDatos">
        <label for="contrasena">Cambiar contrasena</label>
        <input type="password" name="cambiarContrasena" class="capturarDatos">
        <span>Si no quieres cambiar tu contraseña deja esto en blanco </span>
        <input type="submit" value="Actualizar datos" class="boton_incio-sesion" name="actualizarDatosDoc">
      </div>

      <?php 
      
    }
  }
 }

      ?>
      </form>
      

  <script type="module" src="../App.js"></script>
</body>
</html>