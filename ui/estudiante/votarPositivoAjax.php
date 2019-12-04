<?php

$idEs = $_POST["idEstudiante"];
$idPregunta = $_POST["idPregunta"];

$pregunta = new Publicacion($idPregunta);
$pregunta -> select();
$votosActuales = $pregunta -> getVotoPositivo();

$votos = new VotosEstudiante($idPregunta, $idEs, "pos");
$votos -> select();
    
$mensaje = "";
$icono = "fas fa-thumbs-up";

if($votos -> existeVoto()){
    $votos -> select();
    if($votos -> getVoto() == "pos"){
        $votosActuales--;
        $pregunta -> insertarVotoPos($votosActuales);
        $pregunta -> select();
        $votos -> delete();
        $icono = "far fa-thumbs-up";
    }else{
       $mensaje = "No puedes votar mas de una vez. Ya calificaste como \"poco util\" esta pregunta.";
    }
}else{
    $votosActuales++;
    $pregunta -> insertarVotoPos($votosActuales);
    $pregunta -> select();  
    $votos -> insert();
}

$cont = $pregunta -> getVotoPositivo();

$datos = array(
    "mensaje" => $mensaje,
    "cont" => $cont,
    "icono" =>$icono
);

echo json_encode($datos);
?>