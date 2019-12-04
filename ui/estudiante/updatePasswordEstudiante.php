<?php
require 'ui/validacionEstudiante.php';
include 'ui/menuEstudiante.php';
$processed = false;
$error = 0;
if(isset($_POST['update'])){
	if($_POST['newPassword'] == $_POST['newPasswordConfirm']){
		$updateEstudiante = new Estudiante($_SESSION['id']);
		$updateEstudiante -> select();
        
		if($updateEstudiante -> getClave() == md5($_POST['currentPassword'])){
			$updateEstudiante -> updatePassword($_POST['newPassword']);
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
			$logEstudiante = new LogEstudiante("","Change Password Estudiante", "", date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
			$logEstudiante -> insert();
			$processed = true;
		} else {
			$error = 2;
		}
	} else {
		$error = 1;
	}
}
?>
<div class="container-fluid bg-white p-5"  style="height: 100vh;">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 bg-light border border-primary rounded-lg">
			<div class="row">
				<div class="col text-center mt-3">
					<h4>Cambiar contraseña</h4>
				</div>
				
			</div>
			<div class="row">
				<div class="col mb-4">
				<?php if($processed){ ?>
					<div class="alert alert-success" >Contraseña actualizada
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } else if($error == 1) { ?>
					<div class="alert alert-danger" >Error. <em>New</em> field and <em>Confirm New</em> field must be equal
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } else if($error == 2) { ?>
					<div class="alert alert-danger"> La contraseña actual ingresada no es correcta.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form_clave" method="post" action="index.php?pid=<?php echo base64_encode("ui/estudiante/updatePasswordEstudiante.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Contraseña actual*</label>
							<input type="password" class="form-control" name="currentPassword" id="currentPassword" required />
							<div id="msClaveAct"></div>
						</div>
						<div class="form-group">
							<label>Contraseña nueva*</label>
							<input type="password" class="form-control" name="newPassword" id="newPassword" required />
							<div id="msClaveNueva"></div>
						</div>
						<div class="form-group">
							<label>Confirmar contraseña nueva*</label>
							<input type="password" class="form-control" name="newPasswordConfirm" id="newPasswordConfirm" required />
							<span id="msClaveNuevaCon"></span>
						</div>
						 <input type="submit" class="btn bg-white text-primary rounded border border-primary text-cente" value="Cambiar clave" id="update" name="update">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="js/valCampos.js"></script>
<script src="js/valCambiarClave.js"></script>
