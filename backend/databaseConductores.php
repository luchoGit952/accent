<?php

        $servidor = "localhost";
        $usuario ="root";
        $contraseña = "";
        $database = "registro_conductores_accent";

        $conn = mysqli_connect($servidor, $usuario, $contraseña, $database);


        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        //   }
        // if($conn){
        //   echo 'conectado';
        // }

?>