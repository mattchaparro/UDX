<?php
if(isset($_POST['recover'])){
    
	$foundEmail = false;
	$generatedPassword = "";
    
    if(isset($_POST["correo"])){
        if(!$foundEmail){
            $recoverAdministrator = new Administrator();
            if($recoverAdministrator -> existEmail($_POST['correo'])) {;
                $generatedPassword = rand(10000000,99999999);
                $recoverAdministrator -> recoverPassword($_POST['correo'], $generatedPassword);
                $foundEmail = true;
            }
        }

        if(!$foundEmail){
            $recoverEstudiante = new Estudiante();
            if($recoverEstudiante -> existEmail($_POST['correo'])) {;
                $generatedPassword = rand(10000000,99999999);
                $recoverEstudiante -> recoverPassword($_POST['correo'], $generatedPassword);
                $foundEmail = true;
            }
        }

        if($foundEmail){
            //Datos del correo
            $destinatario = $_POST["correo"];
            $asunto = "Recuperacion de contraseña - UDXpertis";
            $mensaje = "Tu nueva contraseña es: " . $generatedPassword . ".\nPara cambiarla, inicia sesion y ubica el menu que se encuentra en la parte superior derecha de la barra de nanegacion y a continuacion, da clic en la opcion 'Cambiar clave'.";
            $cabaceras = "From: UDX <contactoudx@gmail.com>";
            mail($destinatario, $asunto, $mensaje, $cabaceras);  
        }   
    }
}
?>
<div>
	<?php include("ui/header.php"); ?>
</div>
<div class="container-fluid mt-5 bg-white p-5"  style="height: 100vh;">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 bg-light border border-primary rounded-lg">
			<div class="row">
				<div class="col text-center mt-3">
					<h4>Recuperar contraseña</h4>
				</div>
				
			</div>
			<div class="row">
				<div class="col mb-4">
					<?php if(isset($_POST['recover'])) { ?>
					<div class="alert alert-success" >Si el correo: <em><?php echo $_POST['correo'] ?></em> fue encontado en el sistema, enviaremos una contraseña provisional</div>
					<?php } else { ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/recoverPassword.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Ingrese el Email</label>
							<input type="email" class="form-control" name="correo" required />
						</div>
						<button type="submit" class="btn bg-white text-primary rounded border border-primary text-center" name="recover">Recuperar contraseña</button>
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
