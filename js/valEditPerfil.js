let valNombre = false;
let valApellido = false;
let valTelefono = false;
let valFoto = false;

const formulario = document.getElementById("form_edit");
const btnEditPerfil = document.getElementById("update");
const nombre = document.getElementById("nombre");
const apellido = document.getElementById("apellido");
const telefono = document.getElementById("telefono");
const foto = document.getElementById("foto");

const msNombre = document.getElementById("msNombre");
const msApellido = document.getElementById("msApellido");
const msTelefono = document.getElementById("msTelefono");
const msFoto = document.getElementById("msFoto");

btnEditPerfil.addEventListener("click", validarFormulario);


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

function validarTelefono(elemento){
    let dato = elemento.value;
    let regEx = /^3[0-9]{9}$/;
    if(regEx.test(dato)){
        valTelefono = true;
        campoCorrecto(telefono, msTelefono, "!Valido!");
    }else{
        valTelefono = false;
        campoIncorrecto(telefono, msTelefono, "Este telefono no es valido");
    }
}

function validarFoto(foto) {
    if(!foto.value){
      valFoto = true;
    }else{
        valFoto = false;
        let tam = foto.files[0].size;
        let nombre = foto.files[0].name;
        console.log("Nombre: " + nombre);
            if(tam > 2000000){
                valFoto = false;
                foto.value = '';
                campoIncorrecto(foto, msFoto, "El tamaño del archivo no puede superar los 2MB.");
            }else{
                let ruta = foto.value;
                let regEx = /(.jpg|.jpeg|.png)$/i;
                if(regEx.test(ruta)){
                    valFoto = true;
                    campoCorrecto(foto, msFoto, "Archivo seleccionado: " + nombre);
                }else{
                    valFoto = false;
                    campoIncorrecto(foto, msFoto, "La extension del archivo no es valida. Solo son permitidas las siguientes extensiones: .jpeg/.jpg/.png");
                    foto.value = '';
                }   
            }
    }
}


function validarFormulario(e){
    validarNombre(nombre);
    validarApellido(apellido);
    validarTelefono(telefono);
    validarFoto(foto);
 
    if(valNombre == true && valApellido == true && valTelefono == true && valFoto == true){
         return true;
    }else{
        e.preventDefault();
        return false;
    }
}