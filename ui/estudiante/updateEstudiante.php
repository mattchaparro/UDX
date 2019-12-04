<?php
$processed=false;
$idEstudiante = $_GET['idEstudiante'];
$updateEstudiante = new Estudiante($idEstudiante);
$updateEstudiante -> select();
$codigo="";
if(isset($_POST['codigo'])){
	$codigo=$_POST['codigo'];
}
$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
$apellido="";
if(isset($_POST['apellido'])){
	$apellido=$_POST['apellido'];
}
$correo="";
if(isset($_POST['correo'])){
	$correo=$_POST['correo'];
}
$fecha_registro=date("d/m/Y");
if(isset($_POST['fecha_registro'])){
	$fecha_registro=$_POST['fecha_registro'];
}
$fecha_actualizacion=date("d/m/Y");
if(isset($_POST['fecha_actualizacion'])){
	$fecha_actualizacion=$_POST['fecha_actualizacion'];
}
$telefono="";
if(isset($_POST['telefono'])){
	$telefono=$_POST['telefono'];
}
$puntaje="";
if(isset($_POST['puntaje'])){
	$puntaje=$_POST['puntaje'];
}
$token="";
if(isset($_POST['token'])){
	$token=$_POST['token'];
}
$state="";
if(isset($_POST['state'])){
	$state=$_POST['state'];
}
$programaAcademico="";
if(isset($_POST['programaAcademico'])){
	$programaAcademico=$_POST['programaAcademico'];
}
$rango="";
if(isset($_POST['rango'])){
	$rango=$_POST['rango'];
}
if(isset($_POST['update'])){
	$updateEstudiante = new Estudiante($idEstudiante, $codigo, $nombre, $apellido, $correo, "", $fecha_registro, $fecha_actualizacion, "", $telefono, $puntaje, $token, $state, $programaAcademico, $rango);
	$updateEstudiante -> update();
	$updateEstudiante -> select();
	$objProgramaAcademico = new ProgramaAcademico($programaAcademico);
	$objProgramaAcademico -> select();
	$nameProgramaAcademico = $objProgramaAcademico -> getNombre() ;
	$objRango = new Rango($rango);
	$objRango -> select();
	$nameRango = $objRango -> getNombre() ;
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
		$logAdministrator = new LogAdministrator("","Edit Estudiante", "Codigo: " . $codigo . ";; Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Correo: " . $correo . ";; Fecha_registro: " . $fecha_registro . ";; Fecha_actualizacion: " . $fecha_actualizacion . ";; Telefono: " . $telefono . ";; Puntaje: " . $puntaje . ";; Token: " . $token . ";; State: " . $state . ";; Programa Academico: " . $nameProgramaAcademico . ";; Rango: " . $nameRango, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Estudiante'){
		$logEstudiante = new LogEstudiante("","Edit Estudiante", "Codigo: " . $codigo . ";; Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Correo: " . $correo . ";; Fecha_registro: " . $fecha_registro . ";; Fecha_actualizacion: " . $fecha_actualizacion . ";; Telefono: " . $telefono . ";; Puntaje: " . $puntaje . ";; Token: " . $token . ";; State: " . $state . ";; Programa Academico: " . $nameProgramaAcademico . ";; Rango: " . $nameRango, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit Estudiante</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/estudiante/updateEstudiante.php") . "&idEstudiante=" . $idEstudiante ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Codigo*</label>
							<input type="text" class="form-control" name="codigo" value="<?php echo $updateEstudiante -> getCodigo() ?>" required />
						</div>
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $updateEstudiante -> getNombre() ?>" required />
						</div>
						<div class="form-group">
							<label>Apellido*</label>
							<input type="text" class="form-control" name="apellido" value="<?php echo $updateEstudiante -> getApellido() ?>" required />
						</div>
						<div class="form-group">
							<label>Correo*</label>
							<input type="email" class="form-control" name="correo" value="<?php echo $updateEstudiante -> getCorreo() ?>"  required />
						</div>
						<div class="form-group">
							<label>Fecha_registro*</label>
							<input type="date" class="form-control" name="fecha_registro" id="fecha_registro" value="<?php echo $updateEstudiante -> getFecha_registro() ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Fecha_actualizacion*</label>
							<input type="date" class="form-control" name="fecha_actualizacion" id="fecha_actualizacion" value="<?php echo $updateEstudiante -> getFecha_actualizacion() ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Telefono*</label>
							<input type="text" class="form-control" name="telefono" value="<?php echo $updateEstudiante -> getTelefono() ?>" required />
						</div>
						<div class="form-group">
							<label>Puntaje*</label>
							<input type="text" class="form-control" name="puntaje" value="<?php echo $updateEstudiante -> getPuntaje() ?>" required />
						</div>
						<div class="form-group">
							<label>Token</label>
							<input type="text" class="form-control" name="token" value="<?php echo $updateEstudiante -> getToken() ?>"/>
						</div>
						<div class="form-group">
							<label>State*</label>
							<input type="text" class="form-control" name="state" value="<?php echo $updateEstudiante -> getState() ?>" required />
						</div>
					<div class="form-group">
						<label>Programa Academico*</label>
						<select class="form-control" name="programaAcademico">
							<?php
							$objProgramaAcademico = new ProgramaAcademico();
							$programaAcademicos = $objProgramaAcademico -> selectAll();
							foreach($programaAcademicos as $currentProgramaAcademico){
								echo "<option value='" . $currentProgramaAcademico -> getIdProgramaAcademico() . "'";
								if($currentProgramaAcademico -> getIdProgramaAcademico() == $updateEstudiante -> getProgramaAcademico() -> getIdProgramaAcademico()){
									echo " selected";
								}
								echo ">" . $currentProgramaAcademico -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Rango*</label>
						<select class="form-control" name="rango">
							<?php
							$objRango = new Rango();
							$rangos = $objRango -> selectAll();
							foreach($rangos as $currentRango){
								echo "<option value='" . $currentRango -> getIdRango() . "'";
								if($currentRango -> getIdRango() == $updateEstudiante -> getRango() -> getIdRango()){
									echo " selected";
								}
								echo ">" . $currentRango -> getNombre() . "</option>";
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
