<?php
$processed=false;
$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
$descripcion="";
if(isset($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];
}
$valorMinimo="";
if(isset($_POST['valorMinimo'])){
	$valorMinimo=$_POST['valorMinimo'];
}
$valorMaximo="";
if(isset($_POST['valorMaximo'])){
	$valorMaximo=$_POST['valorMaximo'];
}
if(isset($_POST['insert'])){
	$newRango = new Rango("", $nombre, $descripcion, $valorMinimo, $valorMaximo);
	$newRango -> insert();
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
		$logAdministrator = new LogAdministrator("","Create Rango", "Nombre: " . $nombre . ";; Descripcion: " . $descripcion . ";; Valor Minimo: " . $valorMinimo . ";; Valor Maximo: " . $valorMaximo, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Estudiante'){
		$logEstudiante = new LogEstudiante("","Create Rango", "Nombre: " . $nombre . ";; Descripcion: " . $descripcion . ";; Valor Minimo: " . $valorMinimo . ";; Valor Maximo: " . $valorMaximo, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Create Rango</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Entered
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/rango/insertRango.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" required />
						</div>
						<div class="form-group">
							<label>Descripcion*</label>
							<input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion ?>" required />
						</div>
						<div class="form-group">
							<label>Valor Minimo*</label>
							<input type="text" class="form-control" name="valorMinimo" value="<?php echo $valorMinimo ?>" required />
						</div>
						<div class="form-group">
							<label>Valor Maximo*</label>
							<input type="text" class="form-control" name="valorMaximo" value="<?php echo $valorMaximo ?>" required />
						</div>
						<button type="submit" class="btn" name="insert">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
