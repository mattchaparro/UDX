<?php
$signInError = false;
$signInErrorEmail = false;
$signInErrorCode = false;

if(isset($_POST['SignIn'])){
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['codigo'])
       && isset($_POST['correo']) && isset($_POST['programa']) && isset($_POST['clave'])){
          $nombre = $_POST['nombre'];
          $apellido = $_POST['apellido'];
          $codigo = $_POST['codigo'];
          $correo = $_POST['correo'];
          $programa = $_POST['programa'];
          $clave = $_POST['clave'];

        //Creacion del token
        $token = md5($correo.time());
        $estudiante = new Estudiante("", $codigo, $nombre, $apellido, $correo, $clave, date("Y-m-d"), date("Y-m-d"), "", "", "10", $token , "0", $programa, "1");

        if($estudiante -> existeCorreo()){
            $signInErrorEmail = true;
            $signInError = true;
        }

        if($estudiante -> existeCodigo()){
            $signInErrorCode = true;
            $signInError = true;
        }

        if($signInError == false){
            $estudiante -> insert();
            $estudiante = new Estudiante("", $codigo);
            $estudiante -> selectByCodigo();

            //Envio del correo
            $url= "udxperisweb.000webhostapp.com/index.php?pid=". base64_encode('activacion.php');
            $destinatario = $_POST['correo'];
            $asunto = "Verificación de correo - UDXpertis";
            $cabaceras= "From: UDX <contactoudx@gmail.com>";
            $mensaje = "Hola, Gracias por hacer parte de nuestra comunidad. \nPor favor verifica tu dirección de correo haciendo click en el siguiente enlace:\n" . $url . "&token=" . $token . "&id=" . $estudiante -> getIdEstudiante();
            $mail = mail($destinatario, $asunto, $mensaje, $cabaceras);
            if($mail){
                echo "Mensaje enviado";
            }else{
                echo "Error al enviar el mensaje";
            }
            echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/signInMessage.php") . "'</script>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-6 bg-image"></div>
        <div class="col-md-6 bg-white p-0">
            <div class="login d-flex align-items-center">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-md-10 mx-auto">
                        <div class="bg-white rounded my-3">
                            <div class="py-2">
                                <a href="index.php" class="d-flex justify-content-center">
                                    <img src="img/logoUDX.png" alt="UDXpertis" width="50%" class="img-fluid">
                                </a>
                                 <h3 class="mt-2 text-center">Crea tu cuenta</h3>
                            </div>
                            <?php
                                if (isset($_POST['SignIn'])) {
                                    if($signInErrorEmail){
                             ?>
                                    <div class="alert mt-2 alert-danger alert-dismissible fade show"role="alert">
                                        <?php echo "El correo <i>" . $_POST['correo'] . "</i> ya se encuentra registrado."; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                             <?php }

                                    if($signInErrorCode) {
                             ?>
                                    <div class="alert mt-2 alert-danger alert-dismissible fade show"role="alert">
                                        <?php echo "El codigo <i>" . $_POST['codigo'] . "</i> ya se encuentra registrado."; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                            <?php } 
                            }?>
                            <form id="form_registro" action="index.php?pid=<?php echo base64_encode("ui/signIn.php")?>" method="post" class="bg-white p-0 rounded">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                                    <div id="msNombre"></div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
                                    <div id="msApellido"></div>
                                </div>
                                <div class="form-group">
                                    <label for="codigo">Codigo</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingresa tu codigo" required>
                                    <div id="msCodigo"></div>
                                </div>
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo" required>
                                    <div id="msCorreo"></div>
                                </div>
                                <div class="form-group">
                                  <label for="programa">Programa académico</label>
                                  <select class="form-control" id="programa" name="programa" required>

                                        <?php
                                        $programa = new ProgramaAcademico();
                                        $programas = $programa -> selectAll();
                                        foreach ($programas as $pr){
                                            echo "<option value='" . $pr -> getIdProgramaAcademico() . "'>" . $pr -> getNombre() . "</option>";
                                        }
                                        ?>
                                 </select>
                                </div>
                                <div class="form-group">
                                    <label for="clave">Clave</label>
                                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingresa tu clave" required>
                                    <span id="msClave"></span>
                                </div>
                                <input type="submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mt-4" value="Registrarme" id="SignIn" name="SignIn">
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
<script src="js/valSignIn.js"></script>
<!--
<script type="text/javascript">
    $(document).ready(function(){
 	  $("#programa").select2();
    });
</script>
-->