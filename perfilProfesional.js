   export function enviarPerfilProfesional(){
        let formPerfilProfesional = document.getElementById('formPerfilProfesional');
        if(formPerfilProfesional){
          formPerfilProfesional.addEventListener('submit',function(e){
             e.preventDefault();
             capturarDatos();          
          })
        }
   }

function capturarDatos(){
  let formDataPro = new FormData(formPerfilProfesional); 
  fetch('../backend/enviarDatosPerfilPro.php',{
     method:'POST',
     body:formDataPro
  }).then(respuesta => respuesta.text())
  .then(data =>{
     if(data == 'exito'){
        exito();
      
     }else{
      let errorPerfilPro = document.getElementById('errorPerfilPro');
      errorPerfilPro.innerHTML = `
        <p class="errorPerfilPro"> Ups, parece que hay un problema </p>`;
        setTimeout(function(){
         document.querySelector('.errorPerfilPro').remove();
        },3000);
    
     }
})
}

 function exito(){
   let exito = document.getElementById('exito');
   exito.innerHTML = `
        <p class="exito"> En hora buena, hemos recibido tus datos</p>`;
        setTimeout(function(){
         document.querySelector('.exito').remove();
        },3000);
   
 }

//  function error(){
//     let errorPerfilPro = document.getElementById('errorPerfilPro');
//    let capturaUno = document.getElementById('capturaUno ');
//    let capturaDos = document.getElementById('capturaDos');
//    if(capturaUno === "" || capturaUno > 100 && capturaDos ===" " || capturaDos> 100){
//       errorPerfilPro .innerHTML = `<p class="errorPerfilPro"> UFFF, parace que ha ocurrido un erro</p>`;

//       setTimeout(function(){
//          document.querySelector('.errorPerfilPro').remove();
//       },3000);
//    }
//  }