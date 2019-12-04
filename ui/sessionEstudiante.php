<?php

require 'ui/validacionEstudiante.php';
include 'ui/menuEstudiante.php';
include 'modalPreguntas.php';

if(!isset($_SESSION['inicio'])){
   $_SESSION['inicio'] = "1";
}

$estudiante = new Estudiante($_SESSION['id']);
$estudiante -> select();

if(isset($_POST["crearPregunta"])){    
    if($_SESSION['inicio'] != $_POST['idf']){
        $_SESSION['inicio'] = $_POST['idf'];
          $estudiante =  $_SESSION["id"];
          $titulo = $_POST['titulo_pregunta'];
          $descripcion = trim($_POST['descripcion_pregunta']);
          $asignatura = $_POST['asignatura_pregunta'];
          $anexo = "";

          $rutaLocal = $_FILES['anexo_pregunta']['tmp_name'];
          $tipo = $_FILES['anexo_pregunta']['type'];
          echo $tipo;

          if(!empty($rutaLocal) && !empty($tipo)){
             $fecha = new DateTime();
             $rutaRemota = "imagenes/". $fecha ->getTimestamp() . (($tipo == "image/png")?".png":".jpg");
             copy($rutaLocal, $rutaRemota);
             $anexo = $rutaRemota;
          }

          $pregunta = new Publicacion("", $titulo, $descripcion, $anexo, date('Y-m-d H:i:s'), 0, 0, 0, $estudiante, $asignatura);
          $pregunta -> insert();
          $ultimaPublicacion = $pregunta -> lastPublication();

          if(isset($_SESSION["allEtiquetas"])){
            $etiquetas = $_SESSION["allEtiquetas"];
            foreach($etiquetas as $e){
                    $datos = explode("-", $e);
                    $publicacionEtiqueta = new PublicacionEtiqueta("", $ultimaPublicacion, $datos[1]);
                    $publicacionEtiqueta -> insert();
                }
            }

          echo "<script>
                    alertify.success('Pregunta publicada');
                </script>";  
    }  
}

?>
<div class="container-fluid p-2" style="background-color: #EAF1F9;">
	<div class="row">
			<div class="col-12 col-md-3 d-md-block order-0 order-sm-1 mb-3">
				<div class="container">
					<div class="row">
						<div class="col bg-white text-center px-2 py-4" style=" border-radius: 15px;">
                            <h3>Asignaturas</h3>
                            <div class="form-group row mx-2 my-4">
                                <div class="col-10 p-0">
                                    <input type="text" class="form-control m-0" id="buscarAsignatura" placeholder="Busca una asignatura">
                                </div>
                                <div class="col-2 p-0 d-flex justify-content-center align-items-center border ">
                                <i class="fas fa-search"></i>
                                </div>
                            </div>
							<div class="list-group-flush" id="listaAsignaturas"></div>
						</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 d-none d-md-block bg-white text-left px-2 p-4" style=" border-radius: 15px;">
                            <h3 class="text-center mb-3">¿Cómo preguntar?</h3>
                            <div>
                                <p><span class="text-primary"><i class="far fa-dot-circle mr-1"></span></i> Escribe tu pregunta de forma clara y fácil de entender para obtener la mejor respuesta.</p>
                                <p><span class="text-primary"><i class="far fa-dot-circle mr-1"></span></i> Intenta utilizar un título corto pero consciso.</p>
                                <p><span class="text-primary"><i class="far fa-dot-circle mr-1"></span></i> Haz uso correcto de las etiqueta, recuerda que son las palabras clave.</p>
                            </div>   
                        </div>
                    </div>
				</div>
			</div>

			<div class="col-12 col-md-3 order-2">
				<div class="container">
					<div class="row">
						<div class="col bg-white text-center p-4" style=" border-radius: 15px;">
                            <h3>Mi actividad</h3>
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col-4 control">
                                        <a href="#" title="Notificaciones"><i class="far fa-bell" id="iNotificaciones"></i></a>
                                    </div>
                                    <div class="col-4 control">
                                        <a href="#" title="Mis preguntas"><i class="far fa-question-circle" id="iMisPreguntas"></i></a>
                                    </div>
                                    <div class="col-4 control">
                                        <a href="#"><i class="far fa-bell" id="iNotificaciones"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>

		<div class="col-12 col-md-6 order-1">
			<div class="container">
				<div class="row">
				    <div class="col bg-white text-center p-4" style=" border-radius: 15px;">
						<h1 class="display-4 my-3">¿Qué quieres saber?</h1>
                          <form method="post" action="index.php?pid=<?php echo base64_encode("ui/estudiante/buscarPregunta.php");?>">
                            <div class="form-group row mx-2 my-4">
                              <div class="col-10 p-0">
                                <input type="text" class="form-control m-0" id="termino" name="termino" placeholder="Ingresa un termino de busqueda">
                              </div>
                              <div class="col-2 p-0">
                                <button type="submit" class="btn btn-primary  m-0" id="alo">Buscar</button>
                              </div>
                            </div>
                          </form>
					</div>
				</div>

                <div class="row mt-3">
					<div class="col bg-white p-4" style=" border-radius: 15px;">
						<h2 class="my-2 text-center">¿Tienes dudas?</h2>
                    <p class="text-center">Haz clic en el boton para desplegar la ventana donde podrás realizar tu pregunta</p>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                            <button class="btn btn-success rounded-pill btn-block" data-toggle="modal" data-target="#modalPregunta">Preguntar</button>
                            </div>
                        </div>
					</div>
                </div>

                <div class="row my-3 p-0">
                    <div class="col-12 bg-white p-2 m-0" style=" border-radius: 15px;">
                        <div class="container">
                            <div class="row p-0">
                                <div class="col-12  d-flex justify-content-center col-md-2 ">
                                     <a class="navbar-brand" href="#"><span class="text-dark"><i class="fas fa-search mr-2"></i>Filtros</span></a>
                                </div>
                                <div class="col-12 col-md-4 d-flex justify-content-start">
                                    <select class="custom-select" id="filtros">
                                      <option value="" disabled selected>Selecciona un filtro</option>
                                      <option value="1">Sin respuesta</option>
                                      <option value="2">Con respuesta</option>
                                      <option value="3">Mas votadas</option>
                                      <option value="4">Recientes</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 d-flex justify-content-left justify-content-md-end">
                                    <div>
                                        <form class="form-inline my-2 my-lg-0">
                                            <input id="idEtiquetaFiltro" type="hidden" class="form-control">
                                            <input class="form-control mr-sm-2" id="etiqueta_filtro" name="etiqueta_filtro" type="text" placeholder="Busca la etiqueta" aria-label="Search" autocomplete="off">
                                            <button class="btn btn-primary my-2 my-sm-0" type="button" id="filtrarPE">Buscar</button>
                                        </form>
                                        <div>
                                            <div class="row">
                                                <div class="col-8" id="etiquetas_filtro"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
                <div id="preguntasFiltradas"></div>    
			</div>
		</div>
	</div>
</div>
<script src="js/valCampos.js"></script>
<script src="js/valPreguntas.js"></script>

<script>
$(document).ready(function(){

    let rutax = "indexAjax.php?pid=<?php echo base64_encode("ui/publicacion/consultarMasRecientesAjax.php");?>"
    $('#preguntasFiltradas').load(rutax);
//    $.ajax({
//        type: "get",
//        url: rutax,
//        beforeSend: function () {
//            $("#preguntasFiltradas").html("Procesando, espere por favor...");
//        },
//        success: function(){
//            $('#preguntasFiltradas').load(rutax);
//        }
//    });
    $("#filtros").val("");

    $('#descripcion_pregunta').summernote({
        tabsize: 2,
        height: 100
    });

	$("#etiqueta_pregunta").keyup(function(){
        let dato = $("#etiqueta_pregunta").val();
		if(dato != ""){
			let ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/etiqueta/consultarEtiquetaAjax.php"); ?>&etiqueta=" + escape(dato);
            $("#etiquetas").load(ruta);
			$("#etiquetas").show();
		}
        
		if ($("#etiqueta_pregunta").val()=="") {
			$("#etiquetas").hide();
		}
	});
    
    $("#agregarEtiqueta").click(function(){  
        
      let id = $('#idEtiqueta').val();
      let dato = $('#etiqueta_pregunta').val(); 
      let longitud = Array.from($("#etiquetasPregunta").children());

       if(dato.trim().length != 0){
           if((longitud.length) <= 5){
               if(id != ""){
                    campoCorrecto(etiqueta, msEtiquetas, "");
                    $.ajax({
                        type: "POST",
                        data: {id},
                        url: "indexAjax.php?pid=<?php echo base64_encode("ui/etiqueta/agregarEtiquetaTemp.php");?>",
                        success: function(respuesta){
                            $("#msEtiquetas").html(respuesta.responseText);
                            $("#etiquetasPregunta").load("indexAjax.php?pid=<?php echo base64_encode("ui/etiqueta/mostrarEtiquetaAjax.php");?>");
                            $("#etiqueta_pregunta").val('');
                        }
                    });  
                }
            }else{
              campoIncorrecto(etiqueta, msEtiquetas, "Se pueden agregar maximo 5 etiquetas");
            }
        }else{
            campoIncorrecto(etiqueta, msEtiquetas, "Selecciona alguna etiqueta");
        }
    });
    
     $("#asignatura_pregunta").keyup(function(){
        let dato = $("#asignatura_pregunta").val();
		if(dato != ""){
			let ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturaAjax.php"); ?>&asignatura=" + escape(dato);
            $("#asignaturas").load(ruta);
			$("#asignaturas").show();
		}
		if ($("#asignatura_pregunta").val()=="") {
			$("#asignaturas").hide();
		}
    });
    
    $("#buscarAsignatura").keyup(function(){
        let dato = $("#buscarAsignatura").val();
		if(dato != ""){
			let ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturaAjax.php"); ?>&asignatura=" + escape(dato);
            $("#listaAsignaturas").load(ruta);
            $("#listaAsignaturas").show();
            $(".contenidoL").hide();
        }
        if ($("#buscarAsignatura").val()=="") {
            $("#listaAsignaturas").hide();
            $(".contenidoL").show();
        } 
    });    
    
    $("#cerrarModal1").click(function(){
        <?php if(isset($_SESSION['allEtiquetas'])){
            $_SESSION['allEtiquetas'] = null;
        }
        ?>
    });
    
    $("#cerrarModal2").click(function(){
        <?php if(isset($_SESSION['allEtiquetas'])){
            $_SESSION['allEtiquetas'] = null;
        }
        ?>
    });

    $("#iNotificaciones").click(function(){
        $(".notificacionesBox").show();
        $(".mispreguntasBox").hide();
    });

    $("#iMisPreguntas").click(function(){
        $(".mispreguntasBox").show();
        $(".notificacionesBox").hide();
        
    });

    $("#etiqueta_filtro").keyup(function(){
        let dato = $("#etiqueta_filtro").val();
		if(dato != ""){
			let ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/etiqueta/consultarEtiquetaFiltroAjax.php"); ?>&etiqueta=" + escape(dato);
            $("#etiquetas_filtro").load(ruta);
			$("#etiquetas_filtro").show();
		}
		if ($("#etiqueta_filtro").val()=="") {
			$("#etiquetas_filtro").hide();
		}
	});

    $("#filtrarPE").click(function(){
        let dato = $("#idEtiquetaFiltro").val();
        let nombre = $("#etiqueta_filtro").val();
        if(dato != ""){
            let ruta ="indexAjax.php?pid=<?php echo base64_encode("ui/publicacion/consultarPubPorEtiquetaAjax.php");?>&idEtiqueta=" + escape(dato);
            $('#etiquetaFiltro').text(nombre);
            $('#preguntasFiltradas').load(ruta);
            $('#preguntasFiltradas').show();
        }
    });
    
    $("#filtros").change(function(){
        
        let dato = parseInt($("#filtros").val());
        let ruta = "";
        
         switch(dato) {
            case 1:
                ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/publicacion/consultarSinRespuestaAjax.php");?>"
                break;
            case 2:
                ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/publicacion/consultarConRespuestaAjax.php");?>"
                break;  
            case 3:
                ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/publicacion/consultarMasVotadasAjax.php");?>"
                break; 
            case 4:
                ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/publicacion/consultarMasRecientesAjax.php");?>"
                break;
            default:  
         }
        
        $.ajax({
            type: "get",
            url: ruta,
            beforeSend: function () {
                $("#preguntasFiltradas").html("Procesando, espere por favor...");
            },
            success: function(){
                console.log("Bien");
                $('#preguntasFiltradas').load(ruta);
            }
        });
    });
});
</script>

