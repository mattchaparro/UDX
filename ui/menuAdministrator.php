<?php
$administrator = new Administrator($_SESSION['id']);
$administrator -> select();
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" >
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("ui/sessionAdministrator.php") ?>"><span class="fas fa-home" aria-hidden="true"></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Create</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/insertAdministrator.php") ?>">Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/facultad/insertFacultad.php") ?>">Facultad</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/programaAcademico/insertProgramaAcademico.php") ?>">Programa Academico</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/insertEstudiante.php") ?>">Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asignatura/insertAsignatura.php") ?>">Asignatura</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/publicacion/insertPublicacion.php") ?>">Publicacion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/rango/insertRango.php") ?>">Rango</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/etiqueta/insertEtiqueta.php") ?>">Etiqueta</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/causal/insertCausal.php") ?>">Causal</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/reportePublicacion/insertReportePublicacion.php") ?>">Reporte Publicacion</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Get All</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/selectAllAdministrator.php") ?>">Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/facultad/selectAllFacultad.php") ?>">Facultad</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/programaAcademico/selectAllProgramaAcademico.php") ?>">Programa Academico</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>">Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asignatura/selectAllAsignatura.php") ?>">Asignatura</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>">Publicacion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/rango/selectAllRango.php") ?>">Rango</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/etiqueta/selectAllEtiqueta.php") ?>">Etiqueta</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/causal/selectAllCausal.php") ?>">Causal</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/reportePublicacion/selectAllReportePublicacion.php") ?>">Reporte Publicacion</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Search</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/searchAdministrator.php") ?>">Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/facultad/searchFacultad.php") ?>">Facultad</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/programaAcademico/searchProgramaAcademico.php") ?>">Programa Academico</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/searchEstudiante.php") ?>">Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asignatura/searchAsignatura.php") ?>">Asignatura</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/publicacion/searchPublicacion.php") ?>">Publicacion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/rango/searchRango.php") ?>">Rango</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/etiqueta/searchEtiqueta.php") ?>">Etiqueta</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/causal/searchCausal.php") ?>">Causal</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/reportePublicacion/searchReportePublicacion.php") ?>">Reporte Publicacion</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Log</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logAdministrator/searchLogAdministrator.php") ?>">Log Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logEstudiante/searchLogEstudiante.php") ?>">Log Estudiante</a>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown">Administrator: <?php echo $administrator -> getName() . " " . $administrator -> getLastName() ?><span class="caret"></span></a>
				<div class="dropdown-menu" >
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/updateProfileAdministrator.php") ?>">Edit Profile</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/updatePasswordAdministrator.php") ?>">Change Password</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?logOut=1">Log out</a>
			</li>
		</ul>
	</div>
</nav>
