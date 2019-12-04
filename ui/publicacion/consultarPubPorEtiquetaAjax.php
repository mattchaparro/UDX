<?php
if(isset($_GET['idEtiqueta'])){
    $idEtiqueta = $_GET['idEtiqueta'];
    $pregunta = new Publicacion();
    $preguntas = $pregunta -> selectAllByEtiqueta($idEtiqueta);
}



if(count($preguntas) > 0){
    foreach($preguntas as $p){
    $votoPos = $p -> getVotoPositivo();
    $votoNeg = $p -> getVotoNegativo();
    $etiquetaP = new PublicacionEtiqueta("", $p -> getIdPublicacion());
    $etiquetasP = $etiquetaP -> selectAllByPublicacion();
?>

<div class="row my-3">
    <div class="col-12 bg-white p-2" style=" border-radius: 15px;">
        <div class="container">
            <div class="row mt-2 ">
                <div class="col-9">
                    <span><strong><?php echo $p -> getTitulo(); ?></strong></span>
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <span><small><?php echo $p -> getFecha(); ?></small></span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-justify"><?php echo $p -> getDescripcion(); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-9">
                    <?php foreach($etiquetasP as $e) { ?>
                        <span class="badge badge-primary px-2 py-2 rounded">
                            <div>
                                <span><?php echo $e -> getEtiqueta() -> getNombre(); ?></span>
                            </div>
                        </span>
                    <?php } ?>
                </div>
                <div class="col-4 col-md-3 d-flex justify-content-end mb-2">
                    <a href="index.php?pid=<?php echo base64_encode("ui/estudiante/responderPregunta.php"); ?>&idPregunta=<?php echo $p -> getIdPublicacion();?>" class="btn btn-outline-primary rounded-pill">Responder</a>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div>
                        <i class="far fa-thumbs-up mr-1"></i><span class="mr-2"><?php echo $votoPos; ?></span>
                        <i class="far fa-thumbs-down mr-1"></i><span> <?php echo $votoNeg; ?></span>
                    </div>
                </div>
                <div class="col-8 d-flex justify-content-end mb-3">
                    <span class="font-italic"><small><?php echo $p -> getEstudiante() -> getNombre() . " " . $p -> getEstudiante() -> getApellido() ?><img src="img/usuario.png" class="ml-1" width="20px"></small></span>
                </div>
            </div>
        </div>
    </div>
</div>  
<?php
}
}else{
?> 
<div class="row mt-3">
<div class="col-12 p-0">
    <div class="alert alert-success" role="alert">
        No hay publicaciones disponibles por el momento.
    </div>
    </div>
</div> 
<?php  
}
?>