<?php
$estudiante = new Estudiante($_SESSION['id']);
$estudiante -> select();

$notificacion = new Notificacion("",$_SESSION['id']);
$notificaciones = $notificacion -> selectAllByEstudiante();

?>

<nav class="navbar navbar-light navbar-expand-md" style="background-color: #4fb3f6;">
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("ui/sessionEstudiante.php") ?>">
		<img src="img/logoUDX.png" alt="UDXpertis" width="230" class="img-fluid">
	</a>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#items" aria-controls="navbarNav" aria-expanded="false" aria-label="Desplegar barra de navegacion">
              <span class="navbar-toggler-icon"></span>
    </button>
	<div class="collapse navbar-collapse" id="items">
		<ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown  mr-2">
                <a class="nav-link notificaciones text-white  mt-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-bell mr-1"></i>
                        <span class="d-flex align-items-center">
                            <span class="badge badge-light rounded-circle"><?php echo count($notificaciones) ?></span>
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu p-0 sombra" aria-labelledby="navbarDropdown">
                  <p class="text-center my-2">Tienes: <?php echo count($notificaciones) ?> notificaciones</p>
                   <ul class="list-group list-group-flush">
                       <?php 
                        if(count($notificaciones)>0){ 
                            foreach ($notificaciones as $n){
                       ?>
                      <li class="list-group-item py-0 px-2 border">
                          <a href="index.php?pid=<?php echo base64_encode("ui/estudiante/responderPregunta.php");?>&idPregunta=<?php echo $n -> getIdPublicacion(); ?>"><span class="text-primary singularNotificacion">
                              <i class="fas fa-user mr-1"></i>
                            </span><span class="text-dark singularNotificacion">
                                <small><?php echo "<strong>". $n -> getIdEstudiante2() -> getNombre() . " " .  $n -> getIdEstudiante2() -> getApellido() . "</strong> " . $n -> getTipo() -> getDescripcion() . " a tu pregunta. " ?></small>
                            </span>
                          </a>
                      </li>
                    <?php 
                            }
                        }else{ ?>
                        <div>
                            <div class="alert alert-primary" role="alert">
                            No tienes notificaciones nuevas.
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </ul>
                </div>
            </li>
            
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-white" href="#"  data-toggle="dropdown"><img src="img/usuario.png" class="mr-1"><?php echo $estudiante -> getNombre() . " " . $estudiante -> getApellido() ?></a>
				<div class="dropdown-menu" >
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/viewProfileEstudiante.php") ?>">Mi Perfil</a>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/updateProfileEstudiante.php") ?>">Editar Perfil</a>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/updatePasswordEstudiante.php") ?>">Cambiar clave</a>
                    <a class="dropdown-item" href="index.php?logOut=1">Cerrar sesión</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
