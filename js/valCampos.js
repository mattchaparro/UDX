function campoCorrecto(elemento, mensaje, frase) {
    if (elemento.classList.contains("is-invalid") && mensaje.classList.contains("invalid-feedback")) {
        elemento.classList.replace("is-invalid", "is-valid");
        mensaje.classList.replace("invalid-feedback", "valid-feedback");
    } else {
        elemento.classList.add("is-valid");
        mensaje.classList.add("valid-feedback");
    }
    mensaje.innerHTML = frase;
}


function campoIncorrecto(elemento, mensaje, frase) {
    if (elemento.classList.contains("is-valid") && mensaje.classList.contains("valid-feedback")) {
        elemento.classList.add("is-valid", "is-invalid");
        mensaje.classList.replace("valid-feedback", "invalid-feedback");
    } else {
        elemento.classList.add("is-invalid");
        mensaje.classList.add("invalid-feedback");
    }
    mensaje.innerHTML = frase;
}