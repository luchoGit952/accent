// import'./sass/estilosApp.scss';
// import './img/nuevoUsuario.png';
// import './img/fondo-banner.mp4';
// import './img/menu.png';
// import './img/cerrar.png';
// import './img/seguridad.jpg';
// import './img/expertos.jpg'
// import './img/trabajo.svg'
// import './img/enfermero.svg';
// import './img/motivo.jpg';
// import './img/proteccion_de_datos.svg';
// import './img/que_ofrecemos.jpg';
// import './img/puntos.png';
// import './img/posicion.png';
// import './img/calendario.png';

 import {validacion,recuperarContraseña} from'./validarUsuario.js';
  validacion();
  recuperarContraseña();

 import {registroMedico,recuperaraContraseñaConductor} from'./validarMedico.js';
registroMedico();
recuperaraContraseñaConductor();


import{sesionMedico} from'./sesionMedico.js';
  sesionMedico();

 import{sesionUsuario} from './sesionUsuario.js';
  sesionUsuario()




import{enviarPerfilProfesional} from './perfilProfesional.js';
 enviarPerfilProfesional();

 import{ getTotalDay, isLeap, lastMonth, nexttMonth, startDay, writeMonth } from './agendaDoc';
//  lanzarFechas()
 writeMonth();
 getTotalDay();
 isLeap();
 startDay();
 lastMonth();
 nexttMonth();



        let openNav = document.getElementById("openNav");
        if(openNav){
        openNav.addEventListener('click',function(){
            document.getElementById("myNav").style.width = "30%";
        
        })
        }
    
    
        
    let closeNav = document.getElementById("closeNav");
    if(closeNav){
        closeNav.addEventListener('click',function(){
            document.getElementById("myNav").style.width = "0%";
        })

    }

        window.onclick = function(event) {
            if (event.target === closeNav) {
                document.getElementById("myNav").style.width = "0%";
            }
            }



        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");

        var span = document.getElementsByClassName("cerrar_registro")[0];

        if(btn){
        btn.onclick = function() {
            modal.style.display = "block";
        }

        }
        if(span){
        span.onclick = function() {
            modal.style.display = "none";
        }

        }
        window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
        }




    