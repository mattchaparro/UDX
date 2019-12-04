let valClave = false;

const formulario = document.getElementById("form_clave");
const btnCambiarClave = document.getElementById("update");
const claveAct = document.getElementById("currentPassword");
const clave1 = document.getElementById("newPassword");
const clave2 = document.getElementById("newPasswordConfirm");

const msClave1 = document.getElementById("msClaveNueva");
const msClave2 = document.getElementById("msClaveNuevaCon");
const msClaveACt = document.getElementById("msClaveAct");

btnCambiarClave.addEventListener("click", validarFormulario);

function validarClaves(){
    
    let dato1 = clave1.value;
    let dato2 = clave2.value;
    let datoAct = clave2.value;
    
    if(datoAct.trim().length == 0) {
        valClave = false;
        campoIncorrecto(claveAct, msClaveACt, "Ingrese la clave actual");
    }
    
    if(dato1.trim().length >= 8 && dato2.trim().length >= 8){
        if(dato1 == dato2){
            valClave = true;
            campoCorrecto(clave1, msClave1, "!Correcto!");
            campoCorrecto(clave2, msClave2, "!Correcto!");
        }else{
            valClave = false;
            campoIncorrecto(clave1, msClave1, "La contraseñas deben ser iguales");
            campoIncorrecto(clave2, msClave2, "La contraseñas deben ser iguales");
        }
    }else{
        valClave = false;
        if(dato1.trim().length < 8){    
            campoIncorrecto(clave1, msClave1, "La contraseña debe tener entre 8 y 16 caracteres");
        }
        if(dato2.trim().length < 8){
            campoIncorrecto(clave2, msClave2, "La contraseña debe tener entre 8 y 16 caracteres");
        }
    }
}

function validarFormulario(e){
    validarClaves();
    if(valClave == true){
         return true;
    }else{
        e.preventDefault();
        return false;
    }
}