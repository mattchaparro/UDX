<?php
$processed=false;
$publicacion="";
if(isset($_POST['publicacion'])){
	$publicacion=$_POST['publicacion'];
}
if(isset($_GET['idPublicacion'])){
	$publicacion=$_GET['idPublicacion'];
}
$etiqueta="";
if(isset($_POST['etiqueta'])){
	$etiqueta=$_POST['etiqueta'];
}
if(isset($_GET['idEtiqueta'])){
	$etiqueta=$_GET['idEtiqueta'];
}
if(isset($_POST['insert'])){
	$newPublicacionEtiqueta = new PublicacionEtiqueta("", $publicacion, $etiqueta);
	$newPublicacionEtiqueta -> insert();
	$objPublicacion = new Publicacion($publicacion);
	$objPublicacion -> select();
	$namePublicacion = $objPublicacion -> getTitulo() ;
	$objEtiqueta = new Etiqueta($etiqueta);
	$objEtiqueta -> select();
	$nameEtiqueta = $objEtiqueta -> getNombre() ;
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
		$logAdministrator = new LogAdministrator("","Create Publicacion Etiqueta", "Publicacion: " . $namePublicacion . ";; Etiqueta: " . $nameEtiqueta, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Estudiante'){
		$logEstudiante = new LogEstudiante("","Create Publicacion Etiqueta", "Publicacion: " . $namePublicacion . ";; Etiqueta: " . $nameEtiqueta, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Create Publicacion Etiqueta</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Entered
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/publicacionEtiqueta/insertPublicacionEtiqueta.php") ?>" class="bootstrap-form needs-validation"   >
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
						<label>Etiqueta*</label>
						<select class="form-control" name="etiqueta">
							<?php
							$objEtiqueta = new Etiqueta();
							$etiquetas = $objEtiqueta -> selectAll();
							foreach($etiquetas as $currentEtiqueta){
								echo "<option value='" . $currentEtiqueta -> getIdEtiqueta() . "'";
								if($currentEtiqueta -> getIdEtiqueta() == $etiqueta){
									echo " selected";
								}
								echo ">" . $currentEtiqueta -> getNombre() . "</option>";
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
