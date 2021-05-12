export function registroMedico(){
  let formularioConductor = document.getElementById('formularioConductor');
  if(formularioConductor){
    formularioConductor.addEventListener('submit',  (event)=>{
        event.preventDefault();
        enviarDatosMedico();
       
    })
  }
}

function enviarDatosMedico(){
  let  correoCondutor =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  let formDataRegistrarMedico = new FormData(formularioConductor)
 
          //    console.log(formDataRegistrarMedico.get('nombreCondutor'))
          //   console.log(formDataRegistrarMedico.get('emailConductor'))
          //   console.log(formDataRegistrarMedico.get('telefonoConductor'))
          //   console.log(formDataRegistrarMedico.get('ciudadCondutor'))
          //   console.log(formDataRegistrarMedico.get('contraseñaCondutor'))

            fetch('backend/registroConductores.php',{
                method:'POST',
                body:formDataRegistrarMedico
            })
            .then(res => res.text())
            .then(data=>{
                if(data =='exito'){
                  //  alert('exitoso')
          //         document.getElementById('red').innerHTML = "Redireccionando...";
          //       setTimeout(function(){
          // },4000);
           location.href='sesionMedico.html';
                }else{
          var error = document.getElementById('error');
          var mensajeError = "";
          var entrar = false;

          var nombreCondutor = document.getElementById('nombreCondutor');
        var emailConductor = document.getElementById('emailConductor');
        var telefonoConductor = document.getElementById('telefonoConductor');
        var especialidad = document.getElementById('especialidad');
        var identificacion = document.getElementById('identificacion');
        var tarjeta = document.getElementById('tarjeta');
        var contraseñaCondutor = document.getElementById('contraseñaCondutor');
         
        if(nombreCondutor.value ==="" || nombreCondutor.length < 2 || nombreCondutor.length > 20){
        mensajeError +=`El nombre esta vacio o no coincide con lo requerido <br>`;
        entrar = true
       }
       if(emailConductor.value ==="" || correoCondutor.test(emailConductor)  ){
       mensajeError +=`El email esta vacio ono coincide con lo requerido <br>`;
       entrar =  true;
       }
       
       if(telefonoConductor.value ==="" || !isNaN(telefonoConductor) || telefonoConductor.value < 7 ){
       mensajeError +=`El telefono esta vacio o no coincide con lo requerido <br>`;
       entrar = true;

       }
        if(especialidad.value ==="" || especialidad <2 || especialidad >15 ){
        mensajeError +=`La especialidad esta vacia o no coincide con lo requerido <br>`;
        entrar = true;
 
       }
       if(identificacion ==="" || isNaN(identificacion) || identificacion < 5){
       mensajeError+=`La identificacion esta vacia o no coincide con lo requerido <br>`;
       entrar = true;
       }

       if(tarjeta === "" || isNaN(tarjeta) || tarjeta <5){
        mensajeError+=`La tarjeta esta vacia o no coincide con lo requerido <br>`;
        entrar = true;
       }
       if(contraseñaCondutor.value ==="" || contraseñaCondutor.length < 8 || contraseñaCondutor.length > 16){
       mensajeError +=`La contraseña esta vacia o no coincide con lo requerido  <br>`;
         entrar = true
       }
       if(entrar){
         error.innerHTML = mensajeError;
       }
       }
               
})
}

 

  





//  RECUPERADOR CONTRASEÑA

 export  const recuperaraContraseñaConductor = () =>{
  let recuperadorContraseñaConductor = document.getElementById('recuperadorContraseñaConductor');
  if(recuperadorContraseñaConductor){
    recuperadorContraseñaConductor.addEventListener('submit', (event) =>{
         event.preventDefault();
        enviarDadosRecuperadorConductor();
         
      })
  }
 }


 const enviarDadosRecuperadorConductor = ()=>{
   let urlRecuperar = 'http://localhost/ACCENT/src/backend/recuperadorConductor.php';
   let xhttpRecuperarContraseña = new XMLHttpRequest();
   let formDataRecuperarContraseña = new FormData(recuperadorContraseñaConductor);

   xhttpRecuperarContraseña.onreadystatechange = function(){
     if(xhttpRecuperarContraseña.readyState == 4 && xhttpRecuperarContraseña.status == 200){
         let respuestaServidor = this.responseText;
         console.log(respuestaServidor);
         if(respuestaServidor == 200){
           alert('el email si existe')
         }else{
          let recuperar = document.getElementById('recuperar').value;
           var error = document.getElementById('errorRecuperar');
           let mensaje = '';
           let entrar = false;
           if(recuperar.length === 0){
             mensaje += 'El campo esta vacio o no existe en nuestra base de datos';
             entrar = true;
           }
          if(entrar){
           error.innerHTML = mensaje;
          }
         }
     }
   }

   xhttpRecuperarContraseña.open('POST',urlRecuperar,true);
   xhttpRecuperarContraseña.send(formDataRecuperarContraseña)
 }