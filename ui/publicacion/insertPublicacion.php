<?php
$processed=false;
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
if(isset($_GET['idEstudiante'])){
	$estudiante=$_GET['idEstudiante'];
}
$asignatura="";
if(isset($_POST['asignatura'])){
	$asignatura=$_POST['asignatura'];
}
if(isset($_GET['idAsignatura'])){
	$asignatura=$_GET['idAsignatura'];
}
if(isset($_POST['insert'])){
	$newPublicacion = new Publicacion("", $titulo, $descripcion, $anexo, $fecha, $votoPositivo, $votoNegativo, $idRespuesta, $estudiante, $asignatura);
	$newPublicacion -> insert();
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
		$logAdministrator = new LogAdministrator("","Create Publicacion", "Titulo: " . $titulo . ";; Descripcion: " . $descripcion . ";; Anexo: " . $anexo . ";; Fecha: " . $fecha . ";; Voto Positivo: " . $votoPositivo . ";; Voto Negativo: " . $votoNegativo . ";; Id Respuesta: " . $idRespuesta . ";; Estudiante: " . $nameEstudiante . ";; Asignatura: " . $nameAsignatura, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Estudiante'){
		$logEstudiante = new LogEstudiante("","Create Publicacion", "Titulo: " . $titulo . ";; Descripcion: " . $descripcion . ";; Anexo: " . $anexo . ";; Fecha: " . $fecha . ";; Voto Positivo: " . $votoPositivo . ";; Voto Negativo: " . $votoNegativo . ";; Id Respuesta: " . $idRespuesta . ";; Estudiante: " . $nameEstudiante . ";; Asignatura: " . $nameAsignatura, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Create Publicacion</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Entered
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/publicacion/insertPublicacion.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Titulo*</label>
							<input type="text" class="form-control" name="titulo" value="<?php echo $titulo ?>" required />
						</div>
						<div class="form-group">
							<label>Descripcion*</label>
							<textarea id="descripcion" name="descripcion" ><?php echo $descripcion ?></textarea>
							<script>
								$('#descripcion').summernote({
									tabsize: 2,
									height: 100
								});
							</script>
						</div>
						<div class="form-group">
							<label>Anexo</label>
							<input type="text" class="form-control" name="anexo" value="<?php echo $anexo ?>"/>
						</div>
						<div class="form-group">
							<label>Fecha*</label>
							<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $fecha ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Voto Positivo</label>
							<input type="text" class="form-control" name="votoPositivo" value="<?php echo $votoPositivo ?>"/>
						</div>
						<div class="form-group">
							<label>Voto Negativo</label>
							<input type="text" class="form-control" name="votoNegativo" value="<?php echo $votoNegativo ?>"/>
						</div>
						<div class="form-group">
							<label>Id Respuesta</label>
							<input type="text" class="form-control" name="idRespuesta" value="<?php echo $idRespuesta ?>"/>
						</div>
					<div class="form-group">
						<label>Estudiante*</label>
						<select class="form-control" name="estudiante">
							<?php
							$objEstudiante = new Estudiante();
							$estudiantes = $objEstudiante -> selectAll();
							foreach($estudiantes as $currentEstudiante){
								echo "<option value='" . $currentEstudiante -> getIdEstudiante() . "'";
								if($currentEstudiante -> getIdEstudiante() == $estudiante){
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
								if($currentAsignatura -> getIdAsignatura() == $asignatura){
									echo " selected";
								}
								echo ">" . $currentAsignatura -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
						<button type="submit" class="btn" name="insert">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
