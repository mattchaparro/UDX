<?php

if(isset($_GET['idPregunta'])){
    $idPregunta = $_GET['idPregunta'];
    $pregunta = new Publicacion($idPregunta);
    $pregunta -> select();
    $votoPos = $pregunta -> getVotoPositivo();
    $votoNeg = $pregunta -> getVotoNegativo();
    $etiquetaP = new PublicacionEtiqueta("", $pregunta -> getIdPublicacion());
    $etiquetasP = $etiquetaP -> selectAllByPublicacion();
}
?>

<div class="container-fluid p-2 " style="background-color: #E6E6E6;">
    <div class="row">
        <div class="col-2 d-none d-md-block"></div>
        <div class="col-12 col-md-8">
            <div class="container">
                <div class="row">
                    <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10 ">
                                <span><strong><?php echo $pregunta -> getTitulo(); ?></strong></span>
                                </div>
                                <div class="col-2 d-flex justify-content-end">
                                <span><small><?php echo $pregunta -> getFecha(); ?></small></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                        <p class="card-text text-justify"><?php echo $pregunta -> getDescripcion(); ?></p>
                        <div class="img">
                            <img src="<?php echo $pregunta -> getAnexo() ?>" alt="anexo"> 
                        </div>
                            <div class="row mt-4">
                                <div class="col-12 col-md-9  ">
                                    <?php foreach($etiquetasP as $e) { ?>
                                        <span class="badge badge-primary px-2 py-2 rounded">
                                            <div>
                                                <span><?php echo $e -> getEtiqueta() -> getNombre(); ?></span>
                                            </div>
                                        </span>
                                    <?php } ?>
                                </div>         
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-4">
                                <div class="votos">
                                    <a href="#" title="Voto positivo"><i class="far fa-thumbs-up mr-1"></i></a><span class="mr-2"><?php echo $votoPos; ?></span>
                                    <a href="#" title="Voto negativo"><i class="far fa-thumbs-down mr-1"></i></a><span> <?php echo $votoNeg; ?></span>
                                </div>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <span class="font-italic"><small><?php echo $estudiante -> getNombre() . " " . $estudiante -> getApellido() ?><img src="img/usuario.png" class="ml-1" width="20px"></small></span>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3">
                        <div class="container">
                            <div class="row p-4">
                                <div class="col-8">
                                    <span><strong>Tu respuesta</strong></span>
                                </div>
                                <div class="col-4">
                                    <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <form class="mt-2" id="form_crear_pregunta" action="index.php?pid=<?php echo base64_encode("ui/sessionEstudiante.php")?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="descripcion_pregunta">Descripcion</label>
                                        <textarea id="descripcion_pregunta" class="form-control" cols="30" rows="10" name="descripcion_pregunta"></textarea>
                                        <div id="msDescripcion"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="anexo_pregunta">Anexo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="anexo_pregunta" id="anexo_pregunta" aria-describedby="inputGroupFileAddon01">
                                            <div id="msAnexo"></div>
                                            <div id="msAnexo"></div>
                                            <label class="custom-file-label">Seleccione un archivo</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" name="crearRespuesta"class="btn btn-outline-success">Responder</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
        <div class="col-2 d-none d-md-block"></div>
        
    </div>
</div>

<script>
$(document).ready(function(){

    $('#descripcion_pregunta').summernote({
        tabsize: 2,
        height: 100
    });
});

</script>