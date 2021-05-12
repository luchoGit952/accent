  //  SESION CONDUCTOR
 export const sesionMedico = () =>{
  let formularioSesionConductor = document.getElementById('formularioSesionConductor');
  if(formularioSesionConductor){
    formularioSesionConductor.addEventListener('submit',(e)=>{
      e.preventDefault();
      envioDatosSesionConductor();
    
    })
  }
}

 
const envioDatosSesionConductor = () =>{
 let  correoCondutorSesion =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
const datosForm = new FormData(formularioSesionConductor);
// console.log(datosForm.get('emailSesionConductor'));
// console.log(datosForm.get('contraseñaSesionConductor'));

fetch('backend/sesionConductor.php',{
  method:'POST',
  body:datosForm

})
.then(resp => resp.text())
.then(datos=>{
 // console.log(datos);
 if(datos == 'si'){
  console.log('si');
      setTimeout(function(){    
     },3000);
     window.location.href = 'backend/perfilDoc.php';
 }else{
       let errorSesionConductor =  document.getElementById('errorSesionConductor');
       let emailSesionConductor = document.getElementById('emailSesionConductor').value;
       let contraseñaSesionconductor = document.getElementById('contrasenaSesionconductor').value;
       let mensajeErrorSesion = "";
        var   entrarSesion = false;
       
        if(emailSesionConductor === ""  || !correoCondutorSesion.test(emailSesionConductor)){
             mensajeErrorSesion +=`El email esta vacio o no coincide con lo especificado <br>`;
             entrarSesion = true;
            }
            
            if(contraseñaSesionconductor ===""){
              mensajeErrorSesion +=`La contraseña esta vacia o no coincide con la de nuestra base de datos`;
              entrarSesion =  true;
            }
          if(entrarSesion){
             errorSesionConductor.innerHTML=mensajeErrorSesion;
          }
          console.log('no'); 
            }
 
 
})

}
