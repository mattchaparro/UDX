let valCorreo = false;
let valClave = false;

const formulario = document.getElementById("form_inicio");
const btnLogin = document.getElementById("logIn");
const correo = document.getElementById("email");
const clave = document.getElementById("password");
const msCorreo = document.getElementById("msEmail");
const msClave = document.getElementById("msPassword");

btnLogin.addEventListener("click", validarFormulario);

correo.addEventListener("keyup", function(){
    validarCorreo(correo);
});

clave.addEventListener("keyup", function(){
    validarClave(clave);
});

function validarCorreo(elemento){
    let dato = elemento.value;
    let regEx = /^[a-z]+@(correo.)?udistrital\.edu\.co$/;
    if(regEx.test(dato)){
        valCorreo = true;
        campoCorrecto(correo, msCorreo, "!Valido!");
    }else{
        valCorreo = false;
        campoIncorrecto(correo, msCorreo, "Este correo no es valido. Ingresa tu correo institucional");
    }
}

function validarClave(elemento){
    let dato = elemento.value;
    if(dato.trim().length >= 8 && dato.trim().length <= 16){
        valClave = true;
        campoCorrecto(clave, msClave, "!Valido!");
    }else{
        valClave = false;
        campoIncorrecto(clave, msClave, "La contraseña debe tener entre 8 y 16 caracteres");
    }
}

function validarFormulario(e){
    
     validarCorreo(correo);
     validarClave(clave);
    
    if(valCorreo == true && valClave == true){
         return true;
    }else{
        e.preventDefault();
        alertify.alert("Revisa todos los campos. No pueden quedar campos vacios o incorrectos.");
        return false;
        return false;
    }
}
