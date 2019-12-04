<?php
$logInError = false;
$stateError = false;

if(isset($_POST['logIn'])){
	if(isset($_POST['email']) && isset($_POST['password'])){
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
        
		$email = $_POST['email'];
		$password = $_POST['password'];

		$administrator = new Administrator();
		if($administrator -> logIn($email, $password)){
            if($administrator -> getState() == 1){
                $_SESSION['id'] = $administrator -> getIdAdministrator();
                $_SESSION['entity'] = "Administrador";
                $logAdministrator = new LogAdministrator("", "Log In", "", date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $administrator -> getIdAdministrator());
                $logAdministrator -> insert();
                echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/sessionAdministrator.php") . "'</script>";
            }else{
                 $stateError = true;
            }
		}else{
            $estudiante = new Estudiante();
                if($estudiante -> logIn($email, $password)){
                    if($estudiante -> getState() == 1){
                        $_SESSION['id'] = $estudiante -> getIdEstudiante();
                        $_SESSION['entity'] = "Estudiante";
                        $logEstudiante = new LogEstudiante("", "Log In", "", date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $estudiante -> getIdEstudiante());
                        $logEstudiante -> insert();
                        echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/sessionEstudiante.php") . "'</script>";
                    }else{
                         $stateError = true;
                    }
                }else{  
		          $logInError = true;
            }
        }
	}
}
?>

<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-6 bg-image"></div>
        <div class="col-md-6 bg-primary p-0">
            <div class="login d-flex align-items-center">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-md-10 mx-auto">
                        <div class="bg-white rounded">
                            <div class="p-4">
                                <a href="index.php" class="d-flex justify-content-center">
                                    <img src="img/logoUDX.png" alt="UDXpertis" width="50%" class="img-fluid">
                                </a>
                                 <h3 class="mt-3 text-center">¡Bienvenido!</h3>
                            </div>
                            <form id="form_inicio" action="index.php?pid=<?php echo base64_encode("ui/logIn.php")?>" method="post" class="m-0 py-4 px-3 rounded">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Correo" required>
                                    <span id="msEmail"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Clave" required>
                                    <span id="msPassword"></span>
                                </div>
                                <div>
                                    <?php if ($logInError) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Error de correo o clave.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php }
                                         if ($stateError) { ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                Este usuario se encuentra inhabilitado.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php } ?>
                                     <input type="submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" value="Ingresar" id="logIn" name="logIn">
                                     <a href="index.php?pid=<?php echo base64_encode("ui/recoverPassword.php")?>" class="font-weight-bold"><p class="text-center mt-2 mb-5"><small>¿Olvidaste tu contraseña?</small></p></a>
                                     <p class="text-center"><b>¿No estás registrado? Únete</b></p>
                                     <a href="index.php?pid=<?php echo base64_encode("ui/signIn.php")?>" class="btn btn-lg btn-success btn-block btn-login text-uppercase font-weight-bold mb-2">Registrarse</a>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/valCampos.js"></script>
<script src="js/valLogIn.js"></script>