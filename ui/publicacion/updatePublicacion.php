<?php
$processed=false;
$idPublicacion = $_GET['idPublicacion'];
$updatePublicacion = new Publicacion($idPublicacion);
$updatePublicacion -> select();
$titulo="";
if(isset($_POST['titulo'])){
	$titulo=$_POST['titulo'];
}
$descripcion="";
if(isset($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];
}
$anexo="";
if(isset($_POST['anexo'])){
	$anexo=$_POST['anexo'];
}
$fecha=date("d/m/Y");
if(isset($_POST['fecha'])){
	$fecha=$_POST['fecha'];
}
$votoPositivo="";
if(isset($_POST['votoPositivo'])){
	$votoPositivo=$_POST['votoPositivo'];
}
$votoNegativo="";
if(isset($_POST['votoNegativo'])){
	$votoNegativo=$_POST['votoNegativo'];
}
$idRespuesta="";
if(isset($_POST['idRespuesta'])){
	$idRespuesta=$_POST['idRespuesta'];
}
$estudiante="";
if(isset($_POST['estudiante'])){
	$estudiante=$_POST['estudiante'];
}
$asignatura="";
if(isset($_POST['asignatura'])){
	$asignatura=$_POST['asignatura'];
}
if(isset($_POST['update'])){
	$updatePublicacion = new Publicacion($idPublicacion, $titulo, $descripcion, $anexo, $fecha, $votoPositivo, $votoNegativo, $idRespuesta, $estudiante, $asignatura);
	$updatePublicacion -> update();
	$updatePublicacion -> select();
	$objEstudiante = new Estudiante($estudiante);
	$objEstudiante -> select();
	$nameEstudiante = $objEstudiante -> getNombre() . " " . $objEstudiante -> getApellido() ;
	$objAsignatura = new Asignatura($asignatura);
	$objAsignatura -> select();
	$nameAsignatura = $objAsignatura -> getNombre() ;
	$user_ip = getenv('REMOTE_ADDR');
	$agent = $_SERVER["HTTP_USER_AGENT"];
	$browser = "-";
	if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
		$browser = "Internet Explorer";
	} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Chrome";
	} else if (preg_match('/Edge\/\d+/', $agent) ) {
		$browser = "Edge";
	} else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Firefox";
	} else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Opera";
	} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Safari";
	}
	if($_SESSION['entity'] == 'Administrator'){
		$logAdministrator = new LogAdministrator("","Edit Publicacion", "Titulo: " . $titulo . ";; Descripcion: " . $descripcion . ";; Anexo: " . $anexo . ";; Fecha: " . $fecha . ";; Voto Positivo: " . $votoPositivo . ";; Voto Negativo: " . $votoNegativo . ";; Id Respuesta: " . $idRespuesta . ";; Estudiante: " . $nameEstudiante . ";; Asignatura: " . $nameAsignatura, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Estudiante'){
		$logEstudiante = new LogEstudiante("","Edit Publicacion", "Titulo: " . $titulo . ";; Descripcion: " . $descripcion . ";; Anexo: " . $anexo . ";; Fecha: " . $fecha . ";; Voto Positivo: " . $votoPositivo . ";; Voto Negativo: " . $votoNegativo . ";; Id Respuesta: " . $idRespuesta . ";; Estudiante: " . $nameEstudiante . ";; Asignatura: " . $nameAsignatura, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logEstudiante -> insert();
	}
	$processed=true;
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit Publicacion</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/publicacion/updatePublicacion.php") . "&idPublicacion=" . $idPublicacion ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Titulo*</label>
							<input type="text" class="form-control" name="titulo" value="<?php echo $updatePublicacion -> getTitulo() ?>" required />
						</div>
						<div class="form-group">
							<label>Descripcion*</label>
							<textarea id="descripcion" name="descripcion" ><?php echo $updatePublicacion -> getDescripcion() ?></textarea>
							<script>
								$('#descripcion').summernote({
									tabsize: 2,
									height: 100
								});
							</script>
						</div>
						<div class="form-group">
							<label>Anexo</label>
							<input type="text" class="form-control" name="anexo" value="<?php echo $updatePublicacion -> getAnexo() ?>"/>
						</div>
						<div class="form-group">
							<label>Fecha*</label>
							<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $updatePublicacion -> getFecha() ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Voto Positivo</label>
							<input type="text" class="form-control" name="votoPositivo" value="<?php echo $updatePublicacion -> getVotoPositivo() ?>"/>
						</div>
						<div class="form-group">
							<label>Voto Negativo</label>
							<input type="text" class="form-control" name="votoNegativo" value="<?php echo $updatePublicacion -> getVotoNegativo() ?>"/>
						</div>
						<div class="form-group">
							<label>Id Respuesta</label>
							<input type="text" class="form-control" name="idRespuesta" value="<?php echo $updatePublicacion -> getIdRespuesta() ?>"/>
						</div>
					<div class="form-group">
						<label>Estudiante*</label>
						<select class="form-control" name="estudiante">
							<?php
							$objEstudiante = new Estudiante();
							$estudiantes = $objEstudiante -> selectAll();
							foreach($estudiantes as $currentEstudiante){
								echo "<option value='" . $currentEstudiante -> getIdEstudiante() . "'";
								if($currentEstudiante -> getIdEstudiante() == $updatePublicacion -> getEstudiante() -> getIdEstudiante()){
									echo " selected";
								}
								echo ">" . $currentEstudiante -> getNombre() . " " . $currentEstudiante -> getApellido() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Asignatura*</label>
						<select class="form-control" name="asignatura">
							<?php
							$objAsignatura = new Asignatura();
							$asignaturas = $objAsignatura -> selectAll();
							foreach($asignaturas as $currentAsignatura){
								echo "<option value='" . $currentAsignatura -> getIdAsignatura() . "'";
								if($currentAsignatura -> getIdAsignatura() == $updatePublicacion -> getAsignatura() -> getIdAsignatura()){
									echo " selected";
								}
								echo ">" . $currentAsignatura -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
						<button type="submit" class="btn" name="update">Edit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
