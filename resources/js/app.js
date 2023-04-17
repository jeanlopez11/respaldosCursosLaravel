import './bootstrap';
import '../css/estilos.css';
import '../js/validations.js';
import * as Validaciones from '../js/validations.js';
// import {validar,validateEmail,validateOnlyLetter,valideKeyLetter,valideMaxLength,valideMinLength} from '../js/validations.js';
import Alpine from 'alpinejs';


window.Alpine = Alpine;
window.Validations = Validaciones;
Alpine.start();

// import {validar} from '../js/validations.js';
// window.validar = validar;

/** Sweet Alert 2*/
// import Swal from "sweetalert2";
// //De aquí en adelante definir las alertas
// window.successAlert = function (){
//     Swal.fire({
//         position: 'top-end',
//         icon: 'success',
//         title: 'Your post has been saved',
//         showConfirmButton: false,
//         timer: 1900
//     })    
// }
// window.successAlert = function (){
//     Swal.fire({
//         position: 'top-end',
//         icon: 'success',
//         title: 'Your post has been saved',
//         showConfirmButton: false,
//         timer: 1900
//     })    
// }
// window.alert = function (message){
//     Swal.fire({
//         title: 'Creado!',
//         text: message,
//         icon: 'success',
//     })
// }