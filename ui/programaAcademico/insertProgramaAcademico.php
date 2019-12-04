<?php
$processed=false;
$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
$facultad="";
if(isset($_POST['facultad'])){
	$facultad=$_POST['facultad'];
}
if(isset($_GET['idFacultad'])){
	$facultad=$_GET['idFacultad'];
}
if(isset($_POST['insert'])){
	$newProgramaAcademico = new ProgramaAcademico("", $nombre, $facultad);
	$newProgramaAcademico -> insert();
	$objFacultad = new Facultad($facultad);
	$objFacultad -> select();
	$nameFacultad = $objFacultad -> getNombre() ;
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
		$logAdministrator = new LogAdministrator("","Create Programa Academico", "Nombre: " . $nombre . ";; Facultad: " . $nameFacultad, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Estudiante'){
		$logEstudiante = new LogEstudiante("","Create Programa Academico", "Nombre: " . $nombre . ";; Facultad: " . $nameFacultad, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Create Programa Academico</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Entered
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/programaAcademico/insertProgramaAcademico.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" required />
						</div>
					<div class="form-group">
						<label>Facultad*</label>
						<select class="form-control" name="facultad">
							<?php
							$objFacultad = new Facultad();
							$facultads = $objFacultad -> selectAll();
							foreach($facultads as $currentFacultad){
								echo "<option value='" . $currentFacultad -> getIdFacultad() . "'";
								if($currentFacultad -> getIdFacultad() == $facultad){
									echo " selected";
								}
								echo ">" . $currentFacultad -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
						<button type="submit" class="btn btn-primary" name="insert">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
