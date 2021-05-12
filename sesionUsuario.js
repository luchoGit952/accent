  // SESION USUARIOS
  export const sesionUsuario = () =>{
    let formularioSesionUsuario = document.getElementById('formularioSesionUsuario');
    if(formularioSesionUsuario){
      formularioSesionUsuario.addEventListener('submit',(event)=>{
      event.preventDefault();
      enviarDatosSesioUsuario();
      })
    }
  }

  const enviarDatosSesioUsuario = ()=>{
  let  correoSesionUsario =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
     const datosForm = new FormData(formularioSesionUsuario);
    //  console.log(datosForm.get('email_sesion'))
    //  console.log(datosForm.get('contrasena_sesion'))
     fetch('backend/sesionUsuario.php',{
       method:'POST',
       body:datosForm
     })
    .then(resp => resp.text())
    .then(data =>{
      if(data == 'existe'){   
         setTimeout(function(){
        },4000);
         window.location.href='backend/miPerfil.php'
         console.log(data)
      }else{
        // alert('no existe');
         let emailSesion = document.getElementById('emailSesion').value;
         let contraseñaSesion = document.getElementById('contraseñaSesion').value;
         let errorSesion = document.getElementById('errorSesion');
         let mensajeErrorSesion = '';
         let entrarSesion = false
         if(emailSesion ==='' || !correoSesionUsario.test(emailSesion)){
           mensajeErrorSesion+=`El email esta vacio o no coincide con lo especificado <br>`;
           entrarSesion = true
         }
         if(contraseñaSesion === '' ){
          mensajeErrorSesion+=`La contraseña esta vacia o no coincide con la de nuestra base de datos`;
          entrarSesion= true
         }
         if(entrarSesion){
          errorSesion.innerHTML=mensajeErrorSesion;
         }
        
       }
      
    })
   
  }