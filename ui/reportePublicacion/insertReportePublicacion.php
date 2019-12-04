<?php
$processed=false;
$fechaReporte="";
if(isset($_POST['fechaReporte'])){
	$fechaReporte=$_POST['fechaReporte'];
}
$estudiante="";
if(isset($_POST['estudiante'])){
	$estudiante=$_POST['estudiante'];
}
if(isset($_GET['idEstudiante'])){
	$estudiante=$_GET['idEstudiante'];
}
$publicacion="";
if(isset($_POST['publicacion'])){
	$publicacion=$_POST['publicacion'];
}
if(isset($_GET['idPublicacion'])){
	$publicacion=$_GET['idPublicacion'];
}
$causal="";
if(isset($_POST['causal'])){
	$causal=$_POST['causal'];
}
if(isset($_GET['idCausal'])){
	$causal=$_GET['idCausal'];
}
if(isset($_POST['insert'])){
	$newReportePublicacion = new ReportePublicacion("", $fechaReporte, $estudiante, $publicacion, $causal);
	$newReportePublicacion -> insert();
	$objEstudiante = new Estudiante($estudiante);
	$objEstudiante -> select();
	$nameEstudiante = $objEstudiante -> getNombre() . " " . $objEstudiante -> getApellido() ;
	$objPublicacion = new Publicacion($publicacion);
	$objPublicacion -> select();
	$namePublicacion = $objPublicacion -> getTitulo() ;
	$objCausal = new Causal($causal);
	$objCausal -> select();
	$nameCausal = $objCausal -> getDescripcion() ;
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
		$logAdministrator = new LogAdministrator("","Create Reporte Publicacion", "Fecha Reporte: " . $fechaReporte . ";; Estudiante: " . $nameEstudiante . ";; Publicacion: " . $namePublicacion . ";; Causal: " . $nameCausal, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Estudiante'){
		$logEstudiante = new LogEstudiante("","Create Reporte Publicacion", "Fecha Reporte: " . $fechaReporte . ";; Estudiante: " . $nameEstudiante . ";; Publicacion: " . $namePublicacion . ";; Causal: " . $nameCausal, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Create Reporte Publicacion</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Entered
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/reportePublicacion/insertReportePublicacion.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Fecha Reporte*</label>
							<input type="text" class="form-control" name="fechaReporte" value="<?php echo $fechaReporte ?>" required />
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
						<label>Publicacion*</label>
						<select class="form-control" name="publicacion">
							<?php
							$objPublicacion = new Publicacion();
							$publicacions = $objPublicacion -> selectAll();
							foreach($publicacions as $currentPublicacion){
								echo "<option value='" . $currentPublicacion -> getIdPublicacion() . "'";
								if($currentPublicacion -> getIdPublicacion() == $publicacion){
									echo " selected";
								}
								echo ">" . $currentPublicacion -> getTitulo() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Causal*</label>
						<select class="form-control" name="causal">
							<?php
							$objCausal = new Causal();
							$causals = $objCausal -> selectAll();
							foreach($causals as $currentCausal){
								echo "<option value='" . $currentCausal -> getIdCausal() . "'";
								if($currentCausal -> getIdCausal() == $causal){
									echo " selected";
								}
								echo ">" . $currentCausal -> getDescripcion() . "</option>";
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
