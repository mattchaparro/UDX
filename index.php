<?php
session_start();
require("business/Administrator.php");
require("business/LogAdministrator.php");
require("business/Facultad.php");
require("business/ProgramaAcademico.php");
require("business/LogEstudiante.php");
require("business/Estudiante.php");
require("business/Asignatura.php");
require("business/AsignaturaPrograma.php");
require("business/Publicacion.php");
require("business/Rango.php");
require("business/Etiqueta.php");
require("business/PublicacionEtiqueta.php");
require("business/Causal.php");
require("business/ReportePublicacion.php");
require("business/Notificacion.php");
require("business/TipoNotificacion.php");
require("business/VotosEstudiante.php");
ini_set("display_errors","1");

date_default_timezone_set("America/Bogota");

$webPages = array(
	'ui/logIn.php',
	'ui/signIn.php',
	'ui/activacion.php',
	'ui/recoverPassword.php',
	'ui/sessionAdministrator.php',
	'ui/administrator/insertAdministrator.php',
	'ui/administrator/updateAdministrator.php',
	'ui/administrator/selectAllAdministrator.php',
	'ui/administrator/searchAdministrator.php',
	'ui/administrator/updateProfileAdministrator.php',
	'ui/administrator/updatePasswordAdministrator.php',
	'ui/administrator/updatePictureAdministrator.php',
	'ui/logAdministrator/searchLogAdministrator.php',
	'ui/facultad/insertFacultad.php',
	'ui/facultad/updateFacultad.php',
	'ui/facultad/selectAllFacultad.php',
	'ui/facultad/searchFacultad.php',
	'ui/programaAcademico/selectAllProgramaAcademicoByFacultad.php',
	'ui/programaAcademico/insertProgramaAcademico.php',
	'ui/programaAcademico/updateProgramaAcademico.php',
	'ui/programaAcademico/selectAllProgramaAcademico.php',
	'ui/programaAcademico/searchProgramaAcademico.php',
	'ui/estudiante/selectAllEstudianteByProgramaAcademico.php',
	'ui/asignaturaPrograma/selectAllAsignaturaProgramaByProgramaAcademico.php',
	'ui/logEstudiante/searchLogEstudiante.php',
	'ui/sessionEstudiante.php',
	'ui/estudiante/insertEstudiante.php',
	'ui/estudiante/updateEstudiante.php',
	'ui/estudiante/selectAllEstudiante.php',
	'ui/estudiante/searchEstudiante.php',
	'ui/estudiante/updateProfileEstudiante.php',
	'ui/estudiante/updatePasswordEstudiante.php',
	'ui/publicacion/selectAllPublicacionByEstudiante.php',
	'ui/reportePublicacion/selectAllReportePublicacionByEstudiante.php',
	'ui/estudiante/updateFotoEstudiante.php',
	'ui/asignatura/insertAsignatura.php',
	'ui/asignatura/updateAsignatura.php',
	'ui/asignatura/selectAllAsignatura.php',
	'ui/asignatura/searchAsignatura.php',
	'ui/publicacion/selectAllPublicacionByAsignatura.php',
	'ui/asignaturaPrograma/selectAllAsignaturaProgramaByAsignatura.php',
	'ui/asignaturaPrograma/insertAsignaturaPrograma.php',
	'ui/asignaturaPrograma/updateAsignaturaPrograma.php',
	'ui/asignaturaPrograma/selectAllAsignaturaPrograma.php',
	'ui/asignaturaPrograma/searchAsignaturaPrograma.php',
	'ui/publicacion/insertPublicacion.php',
	'ui/publicacion/updatePublicacion.php',
	'ui/publicacion/selectAllPublicacion.php',
	'ui/publicacion/searchPublicacion.php',
	'ui/publicacionEtiqueta/selectAllPublicacionEtiquetaByPublicacion.php',
	'ui/reportePublicacion/selectAllReportePublicacionByPublicacion.php',
	'ui/rango/insertRango.php',
	'ui/rango/updateRango.php',
	'ui/rango/selectAllRango.php',
	'ui/rango/searchRango.php',
	'ui/estudiante/selectAllEstudianteByRango.php',
	'ui/etiqueta/insertEtiqueta.php',
	'ui/etiqueta/updateEtiqueta.php',
	'ui/etiqueta/selectAllEtiqueta.php',
	'ui/etiqueta/searchEtiqueta.php',
	'ui/publicacionEtiqueta/selectAllPublicacionEtiquetaByEtiqueta.php',
	'ui/publicacionEtiqueta/insertPublicacionEtiqueta.php',
	'ui/publicacionEtiqueta/updatePublicacionEtiqueta.php',
	'ui/publicacionEtiqueta/selectAllPublicacionEtiqueta.php',
	'ui/publicacionEtiqueta/searchPublicacionEtiqueta.php',
	'ui/causal/insertCausal.php',
	'ui/causal/updateCausal.php',
	'ui/causal/selectAllCausal.php',
	'ui/causal/searchCausal.php',
	'ui/reportePublicacion/selectAllReportePublicacionByCausal.php',
	'ui/reportePublicacion/insertReportePublicacion.php',
	'ui/reportePublicacion/updateReportePublicacion.php',
	'ui/reportePublicacion/selectAllReportePublicacion.php',
	'ui/reportePublicacion/searchReportePublicacion.php',
);

if(isset($_GET['logOut'])){
    session_destroy();
//	$_SESSION['id']="";
//	$_SESSION['entity']="";
}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>UDX</title>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--Icono ventana del navegador-->
		<link rel="icon" type="image/png" href="img/logo2.png" />

		<!--Bootstrap CSS -->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="css/cosmo/bootstrap.min.css">

		
       <!---Estilos propios css-->
       <link rel="stylesheet" href="css/estilos.css">
       <link rel="stylesheet" href="css/logIn.css">
       
        <!--Funtes Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">

        <!--SummerNote CSS-->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">

		<!--Font awesome CSS-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />

		<!--Select 2 CSS-->
		<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
		
		<!--Alertify CSS-->
        <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
        
        <!--JQuery-->
		 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

		 <!--Alertify JS-->
         <script src="librerias/alertifyjs/alertify.js"></script>
	</head>
	<body>
	
		<?php
		if(empty($_GET['pid'])){
			include('ui/home.php' );
		}else{
			include base64_decode($_GET['pid']);		
		}
		?>
        <footer class="bg-dark text-white text-center p-0">
            <div class="container">
               <div class="row">
                   <div class="col">
                        <p class="m-0 p-4">ITI &copy;. <?php echo date("Y")?> Todos los derechos reservados</p>
                   </div>
               </div>
            </div>
        </footer>
        
        <!--SummerNote JS-->
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

         <!--Select 2 JS-->
		 <script src="librerias/select2/js/select2.js"></script>

		<script charset="utf-8">
			$(function () {
				$("[data-toggle='tooltip']").tooltip();
				$('[data-toggle="popover"]').popover();  
			});

			 
		</script>
	</body>
</html>
