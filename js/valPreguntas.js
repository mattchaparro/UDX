let valTitulo = false;
let valDescripcion = false;
let valEtiquetas = false;
let valAsignatura = false;
let valAnexo = false;

const formulario = document.getElementById("form_crear_pregunta");
const btnCrearPregunta = document.getElementById("enviarPregunta");
const btnAgregarEtiqueta = document.getElementById("agregarEtiqueta");
const titulo = document.getElementById("titulo_pregunta");
const descripcion = document.getElementById("descripcion_pregunta");
const etiqueta = document.getElementById("etiqueta_pregunta");
const asignatura = document.getElementById("asignatura_pregunta");
const anexo = document.getElementById("anexo_pregunta");
const msTitulo = document.getElementById("msTitulo");
const msDescripcion = document.getElementById("msDescripcion");
const msEtiquetas = document.getElementById("msEtiquetas");
const msAsignatura = document.getElementById("msAsignatura");
const msAnexo = document.getElementById("msAnexo");

btnCrearPregunta.addEventListener("click", validarFormulario);

titulo.addEventListener("keyup", function() {
    validarTitulo(titulo);
});

function validarTitulo(elemento) {
    let dato = elemento.value;
    if (dato.trim().length >= 10 && dato.trim().length <= 100) {
        valTitulo = true;
        campoCorrecto(titulo, msTitulo, "");
    } else {
        valTitulo = false;
        campoIncorrecto(titulo, msTitulo, "El titulo debe tener entre 10 y 100 carecteres");
    }
}

function validarDescripcion(elemento) {
    let dato = elemento.value;
    if (dato.trim().length >= 10 && dato.trim().length <= 1000300) {
        valDescripcion = true;
        campoCorrecto(descripcion, msDescripcion, "Corecto");
    } else {
        valDescripcion = false;
        campoIncorrecto(descripcion, msDescripcion, "La descripcion debe tener entre 10 y 2300 caracteres");
    }
}


function validarEtiquetas() {
    let longitud = document.getElementById("etiquetasPregunta").children.length;
    if(longitud != 0){
        if((longitud - 1) != 0){
            valEtiquetas = true;
            campoCorrecto(etiqueta, msEtiquetas, "Correcto");
        }else{
            valEtiquetas = false;
            campoIncorrecto(etiqueta, msEtiquetas, "Selecciona por lo menos una etiqueta");
        }
    }else{
        valEtiquetas = false;
        campoIncorrecto(etiqueta, msEtiquetas, "Selecciona por lo menos una etiqueta");
    }
}

function validarAsignatura(elemento) {
    let dato = elemento.value;
    let id = document.getElementById("idAsignatura").value;
    if (dato.trim().length != 0) {
        if(id.trim().length != 0){
            valAsignatura = true;
            campoCorrecto(asignatura, msAsignatura, "");
        }else{
             valAsignatura = false;
             campoIncorrecto(asignatura, msAsignatura, "Selecciona una asignatura");
        }
    }else{
         valAsignatura = false;
         campoIncorrecto(asignatura, msAsignatura, "Selecciona una asignatura");
    }
}

function validarAnexo(archivo) {
    if (!archivo.value) {
        valAnexo = true;
    } else {
        let tam = archivo.files[0].size;
        let nombre = archivo.files[0].name;
        if (tam > 2000000) {
            valAnexo = false;
            archivo.value = '';
            campoIncorrecto(anexo, msAnexo, "El tamaño del archivo no puede superar los 2MB.");
        } else {
            let ruta = archivo.value;
            let regEx = /(.jpg|.jpeg|.png|.gif|.pdf)$/i;
            if (regEx.test(ruta)) {
                valAnexo = true;
                campoCorrecto(anexo, msAnexo, "Archivo seleccionado: " + nombre);
            } else {
                valAnexo = false;
                campoIncorrecto(anexo, msAnexo, "La extension del archivo no es valida. Solo son permitidas las siguientes extensiones: .jpeg/.jpg/.png/.pdf");
                archivo.value = '';
            }
        }
    }
}

function validarFormulario(e) {
     
    validarTitulo(titulo);
    validarDescripcion(descripcion);
    validarEtiquetas();
    validarAsignatura(asignatura);
    validarAnexo(anexo);

    if (valTitulo == true && valDescripcion == true && valAnexo == true && valAsignatura == true && valEtiquetas == true) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
}