<?php

require 'ui/validacionEstudiante.php';
include 'ui/menuEstudiante.php';
include 'modalReportarPregunta.php';
include 'modalReportarRespuesta.php';

if(!isset($_SESSION['inicio'])){
   $_SESSION['inicio'] = "1";
}

if(isset($_GET['idPregunta'])){
    $idPregunta = $_GET['idPregunta'];
    $p = new Publicacion($idPregunta);
    $p-> select();
    $votoPos = $p -> getVotoPositivo();
    $votoNeg = $p -> getVotoNegativo();
    $etiquetaP = new PublicacionEtiqueta("", $p -> getIdPublicacion());
    $etiquetasP = $etiquetaP -> selectAllByPublicacion();
}

if(isset($_POST['crearRespuesta'])){
    if($_SESSION['inicio'] != $_POST['idf']){
        $_SESSION['inicio'] = $_POST['idf'];
        $estudiante = $_SESSION['id'];
        $descripcion = trim($_POST['descripcion_respuesta']);
        $anexo = ""; 
        $rutaLocal = $_FILES['anexo_respuesta']['tmp_name'];
        $tipo = $_FILES['anexo_respuesta']['type'];

        if(!empty($rutaLocal) && !empty($tipo)){
            $fecha = new DateTime();
            $rutaRemota = "imagenes/". $fecha ->getTimestamp() . (($tipo == "image/png")?".png":".jpg");
            copy($rutaLocal, $rutaRemota);
            $anexo = $rutaRemota;
        }

        $pregunta = new Publicacion($idPregunta);
        $pregunta -> select();
        $estudiantePregunta = $pregunta -> getEstudiante() -> getIdEstudiante();
        $asignaturaPregunta = $pregunta -> getAsignatura() -> getIdAsignatura();

        $respuesta = new Publicacion("", "", $descripcion, $anexo, date("Y-m-d"), 0, 0, $idPregunta , $estudiante, $asignaturaPregunta);
        $respuesta -> insert();

        $notificacion = new Notificacion("", $estudiantePregunta, $_SESSION['id'], $idPregunta, "1", "0", date('Y-m-d H:i:s'));
        $notificacion -> insert();

        echo "<script>
                    alertify.success('Respuesta publicada');
              </script>";    
    }
}
?>

<div class="container-fluid p-2 " style="background-color: #EAF1F9;">
    <div class="row">
        <div class="col-2 d-none d-md-block"></div>
        <div class="col-12 col-md-8">
            <div class="container">
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
                                    <div class="img">
                                        <img src="<?php echo $p -> getAnexo() ?>" alt="anexo" width="50%"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 col-md-9 my-3">
                                    <?php foreach($etiquetasP as $e) { ?>
                                        <span class="badge badge-primary px-2 py-2 rounded">
                                            <div>
                                                <span><?php echo $e -> getEtiqueta() -> getNombre(); ?></span>
                                            </div>
                                        </span>
                                    <?php } ?>
                                </div>
                                <div class="col-4 col-md-3 d-flex justify-content-end my-3">
                                    <a class="text-danger" href="#" data-toggle="modal" data-target="#modalRepPregunta"><small>Reportar abuso </small><i class="fas fa-exclamation-circle"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                   <?php 
                                    
                                    $votos = new VotosEstudiante($_GET['idPregunta'], $_SESSION["id"]);
                                    $votos -> select();
                                    $pos = "";
                                    $neg = "";
                                    
                                    if($votos -> existeVoto()){
                                        if($votos -> getVoto() == "pos"){
                                            $pos = "fas fa-thumbs-up";
                                            $neg = "far fa-thumbs-down";
                                        }else{
                                            $pos = "far fa-thumbs-up";
                                            $neg = "fas fa-thumbs-down";
                                        }
                                    }else{
                                        $pos = "far fa-thumbs-up";
                                        $neg = "far fa-thumbs-down";
                                    }
                                        
                                    ?>
                                    <div class="votos">
                                        <a href="#" id="votoPos" title="Esta pregunta demuestra estar bien formulada, es clara y util">
                                            <i class="<?php echo $pos ?>" id="iconoPos"></i>
                                        </a>
                                        <span class="mr-2" id="numVotosPos"><?php echo $votoPos; ?></span>
                                        <a href="#" id="votoNeg" title="Esta pregunta no demuestra estar bien formulada, es confusa y poco util">
                                            <i class="<?php echo $neg ?> mr-1" id="iconoNeg"></i>
                                        </a>
                                        <span id="numVotosNeg"><?php echo $votoNeg; ?></span>
                                    </div>
                                </div>
                                <div class="col-8 d-flex justify-content-end mb-3">
                                    <span class="font-italic"><small><?php echo $p -> getEstudiante() -> getNombre() . " " . $p -> getEstudiante() -> getApellido(); ?><img src="img/usuario.png" class="ml-1" width="20px"></small></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="" role="alert" id="msVoto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div> 

            <div class="row mt-3">
                <div class="col-12 p-2" style="border-radius: 15px; background-color: #D0F0ED; ">
                    <div class="container" style="background-color: #D0F0ED;">
                        <div class="row mt-2">
                            <div class="col-8">
                            <span><strong>Tu respuesta</strong></span> 
                            </div>
                            <div class="col-4 d-flex justify-content-end popInstruc">
                            <a href="#" id="popInstruc"><i class="far fa-question-circle"></i></a>                            
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <form class="mt-2" id="form_crear_respuesta" action="index.php?pid=<?php echo base64_encode("ui/estudiante/responderPregunta.php");?>&idPregunta=<?php echo $idPregunta; ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="descripcion_respuesta">Descripcion</label>
                                        <textarea id="descripcion_respuesta" class="form-control" cols="30" rows="10" name="descripcion_respuesta"></textarea>
                                        <div id="msDescripcion"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="anexo_respuesta">Anexo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="anexo_respuesta" id="anexo_respuesta" aria-describedby="inputGroupFileAddon01">
                                            <div id="msAnexo"></div>
                                            <div id="msAnexo"></div>
                                            <label class="custom-file-label">Seleccione un archivo</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" name="crearRespuesta"class="btn btn-success rounded rounded-pill">Responder</button>
                                        <input type="hidden" name="idf" value="<?php echo md5(time())?>">
                                    </div>
                                </form>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>   
            
            <div class="row mt-3 bg-white">
                <div class="col-12 p-2" style="border-radius: 15px;">
                <div class="text-center">
                    <h3><strong>Más respuestas</strong></h3>
                </div> 
                    <div class="container">
                    <?php
                        $respuesta = new Publicacion("","","","","","","", $idPregunta);
                        $respuestas = $respuesta -> selectAllRespuesta();
                            if(count($respuestas) > 0){
                                foreach($respuestas as $p){
                                $votoPos = $p -> getVotoPositivo();
                                $votoNeg = $p -> getVotoNegativo();
                    ?>
                    <div class="row bg-white border-top border-botton">
                        <div class="col py-3">
                            <div class="container">
                                <div class="row mb-2">
                                    <div class="col-10">
                                        <span><strong><?php echo $p -> getEstudiante() -> getNombre() . " " . $p -> getEstudiante() -> getApellido() . " "; ?></strong>respondió:  </span>
                                    </div>
                                    <div class="col-2 d-flex justify-content-end">
                                        <span><small><?php echo $p -> getFecha(); ?></small></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="text-justify"><?php echo $p -> getDescripcion(); ?></p>
                                        <div class="img">
                                            <img src="<?php echo $p -> getAnexo() ?>" alt="anexo" width="50%"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-8 col-md-9">
                                    <div class="votos">
                                        <i class="far fa-thumbs-up mr-1"></i><span class="mr-2"><?php echo $votoPos; ?></span>
                                        <i class="far fa-thumbs-down mr-1"></i><span> <?php echo $votoNeg; ?></span>
                                    </div>
                                </div>
                                <div class="col-4 col-md-3 d-flex justify-content-end">
                                    <a class="text-danger" href="#" data-toggle="modal" data-target="#modalRepRespuesta"><small>Reportar abuso </small><i class="fas fa-exclamation-circle"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                        
                        <?php
                            }
                        }else{
                        ?> 
                        <div class="row bg-white">
                            <div class="col p-1">
                                <div class="alert m-0" role="alert">
                                No hay respuestas para esta pregunta. <strong>¡Sé el primero en responder!</strong>.
                                </div>
                            </div>
                        </div> 
                        <?php  
                            }
                        ?>
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

    $("#votoPos").click(function(e){
        e.preventDefault();
        let idPregunta = <?php echo $_GET['idPregunta'] ?>;
        let idEstudiante = <?php echo $_SESSION['id'] ?>;
        let datos = {
            "idPregunta": idPregunta,
            "idEstudiante": idEstudiante
        }
        $.ajax({
            type: "POST",
            data: datos,
            url: "indexAjax.php?pid=<?php echo base64_encode("ui/estudiante/votarPositivoAjax.php");?>",
            success: function(respuesta){
                
                let datos = JSON.parse(respuesta);
                let icono = datos["icono"];
                let mensaje = datos["mensaje"];
                let votos = datos["votos"];
                
                $("#msVoto").text(datos["mensaje"]);
                if(mensaje != ""){
                    $("#msVoto").addClass("alert alert-danger");
                }else{
                     $("#msVoto").removeClass("alert alert-danger");
                     if(icono == "fas fa-thumbs-up"){
                       $("#iconoPos").removeClass("far fa-thumbs-up");
                       $("#iconoPos").addClass("fas fa-thumbs-up");
                     }else if(icono == "far fa-thumbs-up"){
                        $("#iconoPos").removeClass("fas fa-thumbs-up");
                        $("#iconoPos").addClass("far fa-thumbs-up");
                     }
                     $("#numVotosPos").text(datos["cont"]);
                }
            }
        }); 
    });

    $("#votoNeg").click(function(e){
        e.preventDefault();
        let idPregunta = <?php echo $_GET['idPregunta'] ?>;
        let idEstudiante = <?php echo $_SESSION['id'] ?>;
        let datos = {
            "idPregunta": idPregunta,
            "idEstudiante": idEstudiante
        }
        $.ajax({
            type: "POST",
            data: datos,
            url: "indexAjax.php?pid=<?php echo base64_encode("ui/estudiante/votarNegativoAjax.php");?>",
            success: function(respuesta){
                
                let datos = JSON.parse(respuesta);
                let icono = datos["icono"];
                let mensaje = datos["mensaje"];
                let votos = datos["votos"];
                
                $("#msVoto").text(datos["mensaje"]);
                if(mensaje != ""){
                    $("#msVoto").addClass("alert alert-danger");
                }else{
                     $("#msVoto").removeClass("alert alert-danger");
                     if(icono == "fas fa-thumbs-down"){
                       $("#iconoNeg").removeClass("far fa-thumbs-down");
                       $("#iconoNeg").addClass("fas fa-thumbs-down");
                     }else if(icono == "far fa-thumbs-down"){
                        $("#iconoNeg").removeClass("fas fa-thumbs-down");
                        $("#iconoNeg").addClass("far fa-thumbs-down");
                     }
                     $("#numVotosNeg").text(datos["cont"]);
                }
            }
        }); 
    });
    
    $("#enviarNotificacionPreg").click(function(e){
        let idPregunta = <?php echo $_GET['idPregunta'] ?>;
        let idEstudiante = <?php echo $_SESSION['id'] ?>;
        let seleccion = $('input:radio[name=causalPre]:checked').val();
        let datos = {
            "idPregunta": idPregunta,
            "idCausal": seleccion,
            "idEstudiante": idEstudiante
        }
        if(typeof seleccion === 'undefined'){
            $("#msReporte").addClass("alert-danger");
            $("#msReporte").text("Selecciona una opcion");
        }else{
            $("#msOpcion").text("");
            $.ajax({
            type: "POST",
            data: datos,
            url: "indexAjax.php?pid=<?php echo base64_encode("ui/estudiante/reportarPreguntaAjax.php");?>",
            success: function(respuesta){
                if(respuesta == "El reporte ya existe"){
                   $("#msReporte").addClass("alert-danger");
                   $("#msReporte").text(respuesta);
                }else{
                    $("#msReporte").text("");
                    $("#msReporte").removeClass("alert-danger");
                    $('#modalRepPregunta').modal('hide');
                    $("#form_reporte")[0].reset();
                    alertify.success(respuesta);
                }
            }
        }); 
      }
    });
    
    $("#enviarNotificacionRes").click(function(e){
        alert("Respuesta");
    });
});

</script>