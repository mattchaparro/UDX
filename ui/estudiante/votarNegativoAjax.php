<?php

$idEs = $_POST["idEstudiante"];
$idPregunta = $_POST["idPregunta"];

$pregunta = new Publicacion($idPregunta);
$pregunta -> select();
$votosActuales = $pregunta -> getVotoNegativo();

$votos = new VotosEstudiante($idPregunta, $idEs, "neg");
$votos -> select();
    
$mensaje = "";
$icono = "fas fa-thumbs-down";

if($votos -> existeVoto()){
    $votos -> select();
    if($votos -> getVoto() == "neg"){
        $votosActuales--;
        $pregunta -> insertarVotoNeg($votosActuales);
        $pregunta -> select();
        $votos -> delete();
        $icono = "far fa-thumbs-down";
    }else{
       $mensaje = "No puedes votar mas de una vez. Ya calificaste como  \"util\" esta pregunta.";
    }
}else{
    $votosActuales++;
    $pregunta -> insertarVotoNeg($votosActuales);
    $pregunta -> select();  
    $votos -> insert();
}

$cont = $pregunta -> getVotoNegativo();

$datos = array(
    "mensaje" => $mensaje,
    "cont" => $cont,
    "icono" =>$icono
);

echo json_encode($datos);
?>