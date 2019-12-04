<?php
require_once 'ui/validacionEstudiante.php';
include_once 'ui/menuEstudiante.php';

if(isset($_POST['termino'])){
    $termino = $_POST['termino'];
    $pregunta = new Publicacion();
    $preguntas = $pregunta -> searchByTitulo($termino);
}

?>
<div class="container-fluid p-2" style="background-color: #EAF1F9;">
    <div class="row">
       
        <div class="col-12 col-md-8 mx-auto order-0 order-sm-1 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col bg-white" style="border-radius: 15px;">
                        <form method="post" action="index.php?pid=<?php echo base64_encode("ui/estudiante/buscarPregunta.php");?>">
                          <div class="row py-2 px-3">
                               <div class="col-8 col-md-10 p-0">
                                    <input class="form-control" id="termino" name="termino" type="search" placeholder="¿Cuál es tu pregunta?" aria-label="Search">
                               </div>
                                <div class="col-4 col-md-2 p-0 d-flex justify-content-center">
                                     <button class="btn btn-outline-success btn-block" type="submit">Buscar</button>
                                </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8 mx-auto order-1">
			<div class="container">
				<div class="row">
                    <div class="col-12 text-center  py-2" style="border-radius: 15px; background-color: #D0F0ED;">
                        <h3 class="text-center">Preguntas relacionadas</h3>
                        <span>Resultados de búsqueda: <?php echo count($preguntas); ?></span>
                    </div>
                </div>
                

                <?php if(count($preguntas) > 0 ){
                            foreach ($preguntas as $p){ 
                                $votoPos = $p -> getVotoPositivo();
                                $votoNeg = $p -> getVotoNegativo();
                                $etiquetaP = new PublicacionEtiqueta("", $p -> getIdPublicacion());
                                $etiquetasP = $etiquetaP -> selectAllByPublicacion();
                ?>
                             
                <div class="row mt-3">
                    <div class="col-12 bg-white p-2" style=" border-radius: 15px;">
                        <div class="container">
                            <div class="row mt-2 ">
                                <div class="col-10">
                                    <span><strong><?php echo $p -> getTitulo(); ?></strong></span>
                                </div>
                                <div class="col-2 d-flex justify-content-end">
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

                <?php }
                }else{  ?>
                <div class="row mt-3">
                    <div class="col-12 p-0">
                        <div class="alert alert-success" role="alert">
                        No hay respuestas para esta pregunta. <strong>¡Sé el primero en responder!</strong>.
                        </div>
                    </div>
                </div> 
                <?php } ?>
            </div>
        </div>
    </div>
</div>

