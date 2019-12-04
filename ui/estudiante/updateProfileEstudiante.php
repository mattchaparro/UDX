<?php
require 'ui/validacionEstudiante.php';
include 'ui/menuEstudiante.php';
$error = 0;
$updateEstudiante = new Estudiante($_SESSION['id']);
$updateEstudiante -> select();

$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}

$apellido="";
if(isset($_POST['apellido'])){
	$apellido=$_POST['apellido'];
}

$telefono="";
if(isset($_POST['telefono'])){
	$telefono=$_POST['telefono'];
}

if(isset($_POST['update'])){
    
	$updateEstudiante = new Estudiante($_SESSION['id'], "", $nombre, $apellido, "", "", "",  date("Y-m-d"), "", $telefono);
	$updateEstudiante -> updateFromEstudiante();
    
    $rutaLocal = $_FILES['foto']['tmp_name'];
    $tipo = $_FILES['foto']['type'];
    
    if(!empty($rutaLocal) && !empty($tipo)){
        if($tipo == "image/png" || $tipo == "image/jpeg"){
            $fecha = new DateTime();
            $rutaRemota = "imagenes/". $fecha ->getTimestamp() . (($tipo == "image/png")?".png":".jpg");
            copy($rutaLocal, $rutaRemota);
            $estudiante = new Estudiante($_SESSION['id']);
            $estudiante -> select();        
        if($estudiante -> getFoto() != ""){
            unlink($estudiante -> getFoto());            
        }
            $estudiante = new Estudiante($_SESSION['id'], "", "", "", "", "", "", "", $rutaRemota);
            $estudiante -> cambiarFoto();
        }else{
            $error = 1;
        }   
    }


    
	$updateEstudiante -> select();
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
	$logEstudiante = new LogEstudiante("","Edit Profile Estudiante","Nombre: " . $nombre . ";; Apellido: " . $apellido .  ";; Telefono: " . $telefono , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
	$logEstudiante -> insert();
}
?>

<div class="container-fluid bg-white p-5" style="height: 100vh;">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 bg-light border border-primary rounded-lg">
			<div class="row">
				<div class="col text-center mt-3">
					<h4>Editar datos del perfil</h4>
				</div>
				
			</div>
			<div class="row">
			<div class="card-body">
					<?php if (isset($_POST['update'])) { ?>
					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
						role="alert">
						<?php if ($error==0) {
						    echo "Datos actualizados con exito";
						}else if($error == 1){
						    echo "Seleccione solo archivos png o jpg";
						} ?>
						<button type="button" class="close" data-dismiss="alert"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					
                        <form id="form_edit" method="post" action="index.php?pid=<?php echo base64_encode("ui/estudiante/updateProfileEstudiante.php");?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nombre">Nombre*</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $updateEstudiante -> getNombre() ?>" required />
                                <div id="msNombre"></div>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido*</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $updateEstudiante -> getApellido() ?>" required />
                                <div id="msApellido"></div>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono*</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $updateEstudiante -> getTelefono() ?>" required />
                                <div id="msTelefono"></div>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="foto" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label">Seleccione un archivo png o jpg</label>
                                    <div id="msFoto"></div>
                                </div>
                            </div>
                             <input type="submit" class="btn bg-white text-primary rounded border border-primary text-center" value="Actualizar Datos" id="update" name="update">
                        </form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="js/valCampos.js"></script>
<script src="js/valEditPerfil.js"></script>