 
 
 export function validacion(){
  var formularioUsuario = document.getElementById('formularioUsuario');
       if(formularioUsuario){
         formularioUsuario.addEventListener('submit', (event)=>{
            event.preventDefault()
           enviarDatos();
         })
       }
  }
  
  function enviarDatos(){
      var  correoUsuario =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
      var formDataRegistroUsuario = new FormData(formularioUsuario);
        
        //  console.log(formDataRegistroUsuario.get('nombreUsuario'))
        //  console.log(formDataRegistroUsuario.get('emailUsuario'))
        //   console.log(formDataRegistroUsuario.get('telefonoUsuario'))
        //  console.log(formDataRegistroUsuario.get('cedulaUsuario'))
        //  console.log(formDataRegistroUsuario.get('contraseñaUsuario'))
    
        fetch('backend/registroUsuario.php',{
           method:'POST',
           body:formDataRegistroUsuario
        })
        .then(respuesta =>respuesta.text())
        .then(datos =>{
          //  console.log(datos);
          if(datos =='ok'){
            document.getElementById('red').innerHTML = "Redireccionando...";
            setTimeout(function(){
            },4000);
             location.href='sesionUsuario.html'
             console.log(data)
          }else{
                  var errorUsuario = document.getElementById('errorUsuario');
                      var errorMensaje = ''; 
                      var entrarUsuario = false;
                      var nombre = document.getElementById('nombreUsuario').value;
                      var telefono = document.getElementById('telefonoUsuario').value;
                      var cedula = document.getElementById('cedulaUsuario').value;
                      var email = document.getElementById('emailUsuario').value;
                      var contraseña = document.getElementById('contraseñaUsuario').value;
                    
                      if(nombre === "" || nombre.length  < 2 || nombre  > 20 ){
                         errorMensaje += `El nombre esta vacio o no coincide con lo requerido <br>`;
                         entrarUsuario = true
                        }
                        if(email === "" || !correoUsuario.test(email)){
                           errorMensaje += `El email esta vacio o no coincide con lo requerido<br>`;
                             entrarUsuario = true
                        }
                        if(telefono === "" || isNaN(telefono) || telefono < 7 ){
                             errorMensaje += `El telefono esta vacio o no coincide con lo requerido <br>`;
                             entrarUsuario = true
                        }
                        if(cedula ==="" || isNaN(cedula) || cedula <8){
                          errorMensaje += `La cedula esta vacia o no coincide con lo requerido <br>`;
                             entrarUsuario = true
                        }
                      if(contraseña === "" || contraseña.length  <8 || contraseña.length  > 16){
                       errorMensaje += `La contraseña  esta vacio o no coincide con lo requerido <br>`;
                         entrarUsuario = true 
                      }
                      if(entrarUsuario){
                        errorUsuario.innerHTML = errorMensaje;
                      }
          }
        })
     }

  // const enviarDatos = () =>{
  //   var  correoUsuario =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  //  let urlRegistroUsuario = 'http://localhost/ACCENT/src/backend/registroUsuario.php';
  //  var formDataRegistroUsuario = new FormData(formularioUsuario);
  //  let xhttpRegistroUsuario = new XMLHttpRequest();
  //  xhttpRegistroUsuario.onreadystatechange = function(){
  //      if(xhttpRegistroUsuario.readyState == 4 && xhttpRegistroUsuario.status == 200){
  //       //  console.log(xhttpUsuarioRegistroUsuario.responseText);
  //       let respuestaServidor = this.responseText;
  //       console.log(respuestaServidor)
  //       if(respuestaServidor == 200){
  //          document.getElementById('red').innerHTML = "Redireccionando...";
  //         setTimeout(function(){
  //           window.location.href='backend/miPerfil.php';
  //         },3000)

  //       }else{
  //           var errorUsuario = document.getElementById('errorUsuario');
  //           var errorMensaje = ''; 
  //           var entrarUsuario = false;
  //           var nombre = document.getElementById('nombreUsuario').value;
  //           var telefono = document.getElementById('telefonoUsuario').value;
  //           var cedula = document.getElementById('cedulaUsuario').value;
  //           var email = document.getElementById('emailUsuario').value;
  //           var contraseña = document.getElementById('contraseñaUsuario').value;
          
  //           if(nombre === "" || nombre.length  < 2 || nombre  > 20 ){
  //              errorMensaje += `El nombre esta vacio o no coincide con lo requerido <br>`;
  //              entrarUsuario = true
  //             }
  //             if(email === "" || !correoUsuario.test(email)){
  //                errorMensaje += `El email esta vacio o no coincide con lo requerido<br>`;
  //                  entrarUsuario = true
  //             }
  //             if(telefono === "" || isNaN(telefono) || telefono < 7 ){
  //                  errorMensaje += `El telefono esta vacio o no coincide con lo requerido <br>`;
  //                  entrarUsuario = true
  //             }
  //             if(cedula ==="" || isNaN(cedula) || cedula > 12){
  //               errorMensaje += `La cedula esta vacia o no coincide con lo requerido <br>`;
  //                  entrarUsuario = true
  //             }
  //           if(contraseña === "" || contraseña.length  <8 || contraseña.length  > 16){
  //            errorMensaje += `La contraseña  esta vacio o no coincide con lo requerido <br>`;
  //              entrarUsuario = true 
  //           }
  //           if(entrarUsuario){
  //             errorUsuario.innerHTML = errorMensaje;
  //           }
  //       }
        
  //     }
  //  }
  //  xhttpRegistroUsuario.open('POST',urlRegistroUsuario,true);
  //  xhttpRegistroUsuario.send(formDataRegistroUsuario);
  // }




  


  // RECUPERACION DE RCONTRASEÑA USUARIO
  export const recuperarContraseña = ()=>{
   let recuperadorContraseña = document.getElementById('recuperadorContraseña');
   if(recuperadorContraseña){
    recuperadorContraseña.addEventListener('submit',function(event){
     event.preventDefault();
      enviarDatosRecuperarContraseña();
    })
   }
 }
 
 
 
  function enviarDatosRecuperarContraseña(){
    const formDataRecuperarContraseña = new FormData(recuperadorContraseña);
     const urlRecuperar = 'http://localhost/ACCENT/src/backend/recuperadorUsuario.php';
     const xhttpRecuperarContraseña = new XMLHttpRequest();
      xhttpRecuperarContraseña.onreadystatechange = function(){
        if(xhttpRecuperarContraseña.readyState == 4 && xhttpRecuperarContraseña.status == 200){
            var respuestaServidorRecuperar = this.responseText;
            console.log(respuestaServidorRecuperar)
            if(respuestaServidorRecuperar == 200){
              // alert("si existe el email");
            }else{
        
              let recuperar = document.getElementById('recuperar').value;
              let err = '';
              let entrar = false;
              let error = document.getElementById('errorRecuperar');
              if(recuperar.length === 0){
              err+= 'El campo esta vacio o no existe en nuestra base de datos';
              entrar = true;
              }
                  if(entrar){
                 error.innerHTML = err;
                  }
            }
          
      }

    
}
    xhttpRecuperarContraseña.open('POST',urlRecuperar,true);
     xhttpRecuperarContraseña.send(formDataRecuperarContraseña);
}