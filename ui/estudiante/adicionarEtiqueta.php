<?php
require 'ui/validacionEstudiante.php';
include 'ui/menuEstudiante.php';

$error = 0;

if(isset($_POST['crearEtiqueta'])){
    if(isset($_POST['etiqueta'])){
        $etiqueta = new Etiqueta("", $_POST['etiqueta']);   
        if($etiqueta -> existeEtiqueta()){
            $error = 1;
        }else{
            $etiqueta -> insert();
            $error = 2;   
        }
    }
}
?>

<div class="container-fluid bg-white p-5">
	<div class="row">
		<div class="col-12 col-md-6 p-4">
            <h3 class="mb-3">Añadir etiqueta</h3>
            <form id="form_clave" method="post" action="index.php?pid=<?php echo base64_encode("ui/estudiante/adicionarEtiqueta.php") ?>" class="bootstrap-form needs-validation"   >
                <div class="form-group">
                    <label>Nombre de la etiqueta</label>
                    <input type="text" class="form-control" name="etiqueta" id="etiqueta" required />
                    <div id="msEtiqueta"></div>
                </div>
                   	<?php
                        if(isset($_POST['crearEtiqueta'])){
                            if($error == 1){ 
                    ?>
                        <div class="alert mt-2 alert-danger alert-dismissible fade show"role="alert">
                            <?php echo "La etiqueta <i>" . $_POST['etiqueta'] . "</i> ya existe."; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
					<?php 
                         }else if($error == 2){
                    ?>
                        <div class="alert alert-success" > Etiqueta añadida con exito
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                        }    
                    } ?>
                    <input type="submit" class="btn btn-primary" value="Crear etiqueta" name="crearEtiqueta">
            </form>   
		</div>
		<div class="col-12 col-md-6 p-0">
	        <div class="card mb-3" style="background-color: #fff8dc;">
              <div class="card-header"><h2>Creacion de etiquetas</h2></div>
              <div class="card-body text-justify">
               
                <h5 class="card-title">¿Qué es una etiqueta?</h5>
                <p class="card-text">Una etiqueta es una palabra clave que sirve para categorizar una pregunta, determinado sobre qué tema trata y así mismo, categorizándola con otras preguntas similares, englobando aquellas que tratan de una misma temática.</p>
                
                <h5 class="card-title">¿Qué es la creación de etiquetas?</h5>
                <p class="card-text">Cuando se elige crear una nueva etiqueta significa que estas realizando una pregunta sobre alguna tematica que nadie ha tratado aún.</p>
                                 
                <h5 class="card-title">¿Cuándo se debe crear una nueva etiqueta?</h5>
                <p class="card-text">Trata siempre de escoger entre las etiquetas ya existentes. Sólo debes crear etiquetas nuevas en dado caso que sientas que tu pregunta cubre un nuevo tema que nadie más ha preguntado con anterioridad.</p>
                                 
                <h5 class="card-title">¿Qué pasa cuando se crea una nueva etiqueta?</h5>
                <p class="card-text">Cuando creas una nueva etiqueta, esta estará disponible para que todos los demás usuarios de la comunidad puedan usarla. Sin embargo, ten en cuenta lo siguiente:</p>
                <ul>
                    <li>Las nuevas etiquetas se eliminarán automáticamente del sistema si no se utilizan por lo menos en 1 pregunta más en un período de 6 meses.</li>
                    <li>Las etiquetas serán revisadas por los administradores del sitio, con el fin de determinar su utilidad y seriedad de estas.</li>
                </ul>
                <p><b>¡Crea nuevas etiquetas responsablemente!</b></p>
              </div>
            </div>
		</div>
	</div>
</div>