<?php
$processed=false;
$idPublicacionEtiqueta = $_GET['idPublicacionEtiqueta'];
$updatePublicacionEtiqueta = new PublicacionEtiqueta($idPublicacionEtiqueta);
$updatePublicacionEtiqueta -> select();
$publicacion="";
if(isset($_POST['publicacion'])){
	$publicacion=$_POST['publicacion'];
}
$etiqueta="";
if(isset($_POST['etiqueta'])){
	$etiqueta=$_POST['etiqueta'];
}
if(isset($_POST['update'])){
	$updatePublicacionEtiqueta = new PublicacionEtiqueta($idPublicacionEtiqueta, $publicacion, $etiqueta);
	$updatePublicacionEtiqueta -> update();
	$updatePublicacionEtiqueta -> select();
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
		$logAdministrator = new LogAdministrator("","Edit Publicacion Etiqueta", "Publicacion: " . $namePublicacion . ";; Etiqueta: " . $nameEtiqueta, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Estudiante'){
		$logEstudiante = new LogEstudiante("","Edit Publicacion Etiqueta", "Publicacion: " . $namePublicacion . ";; Etiqueta: " . $nameEtiqueta, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit PublicacionEtiqueta</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/publicacionEtiqueta/updatePublicacionEtiqueta.php") . "&idPublicacionEtiqueta=" . $idPublicacionEtiqueta ?>" class="bootstrap-form needs-validation"   >
					<div class="form-group">
						<label>Publicacion*</label>
						<select class="form-control" name="publicacion">
							<?php
							$objPublicacion = new Publicacion();
							$publicacions = $objPublicacion -> selectAll();
							foreach($publicacions as $currentPublicacion){
								echo "<option value='" . $currentPublicacion -> getIdPublicacion() . "'";
								if($currentPublicacion -> getIdPublicacion() == $updatePublicacionEtiqueta -> getPublicacion() -> getIdPublicacion()){
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
								if($currentEtiqueta -> getIdEtiqueta() == $updatePublicacionEtiqueta -> getEtiqueta() -> getIdEtiqueta()){
									echo " selected";
								}
								echo ">" . $currentEtiqueta -> getNombre() . "</option>";
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
