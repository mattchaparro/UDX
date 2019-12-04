let valNombre = false;
let valApellido = false;
let valCodigo  = false;
let valCorreo = false;
let valClave = false;


const formulario = document.getElementById("form_registro");
const btnSignIn = document.getElementById("SignIn");
const nombre = document.getElementById("nombre");
const apellido = document.getElementById("apellido");
const codigo = document.getElementById("codigo");
const correo = document.getElementById("correo");
const clave = document.getElementById("clave");

const msNombre = document.getElementById("msNombre");
const msApellido = document.getElementById("msApellido");
const msCodigo = document.getElementById("msCodigo");
const msCorreo = document.getElementById("msCorreo");
const msClave = document.getElementById("msClave");

btnSignIn.addEventListener("click", validarFormulario);

nombre.addEventListener("keyup", function(){
    validarNombre(nombre);
});

apellido.addEventListener("keyup", function(){
    validarApellido(apellido);
});

correo.addEventListener("keyup", function(){
    validarCorreo(correo);
});

codigo.addEventListener("keyup", function(){
    validarCodigo(codigo);
});

clave.addEventListener("keyup", function(){
    validarClave(clave);
});


function validarNombre(elemento){
    let dato = elemento.value;
    let regEx = /^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$/;
    if(regEx.test(dato)){
        valNombre = true;
        campoCorrecto(nombre, msNombre, "!Valido!");
    }else{
        valNombre = false;
        campoIncorrecto(nombre, msNombre, "Este nombre no es valido. No puede contener numeros ni caracteres extraños y la primer letra de cada apellido debe estar en mayuscula");
    }
}

function validarApellido(elemento){
    let dato = elemento.value;
    let regEx = /^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$/;
    if(regEx.test(dato)){
        valApellido = true;
        campoCorrecto(apellido, msApellido, "!Valido!");
    }else{
        valApellido = false;
        campoIncorrecto(apellido, msApellido, "Este apellido no es valido. No puede contener numeros ni caracteres extraños y la primer letra de cada apellido debe estar en mayuscula");
    }
}

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

function validarCodigo(elemento){
    let dato = elemento.value;
    let regEx = /^[0-9]{11}$/;
    if(regEx.test(dato)){
        valCodigo = true;
        campoCorrecto(codigo, msCodigo, "!Valido!");
    }else{
        valCodigo = false;
        campoIncorrecto(codigo, msCodigo, "Este codigo estudiantil no es valido");
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
    
    validarNombre(nombre);
    validarApellido(apellido);
    validarCorreo(correo);
    validarCodigo(codigo);
    validarClave(clave);
    
    if(valNombre == true && valApellido == true && valCodigo == true && valCorreo == true && valClave == true){
         return true;
    }else{
        e.preventDefault();
        alertify.alert("Revisa todos los campos. No pueden quedar campos vacios o incorrectos.");
        return false;
    }
}
