<?php

$idPregunta = $_POST["idPregunta"];
$idEst = $_POST["idEstudiante"];
$idCausal = $_POST["idCausal"];

$reportePregunta = new ReportePublicacion("", date('Y-m-d H:i:s'), $idEst, $idPregunta, $idCausal);

if($reportePregunta -> existeReporte()){
    echo "El reporte ya existe";
}else{
    $reportePregunta -> insert();
    echo "Reporte enviado con exito";
}
?>