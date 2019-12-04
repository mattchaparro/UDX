<?php
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
require_once("persistence/Connection.php");
$idLogEstudiante = $_GET ['idLogEstudiante'];
$logEstudiante = new LogEstudiante($idLogEstudiante);
$logEstudiante -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Log Estudiante</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Action</th>
			<td><?php echo str_replace(";; ", "<br>", $logEstudiante -> getAction()) ?></td>
		</tr>
		<tr>
			<th>Information</th>
			<td><?php echo str_replace(";; ", "<br>", $logEstudiante -> getInformation()) ?></td>
		</tr>
		<tr>
			<th>Date</th>
			<td><?php echo str_replace(";; ", "<br>", $logEstudiante -> getDate()) ?></td>
		</tr>
		<tr>
			<th>Time</th>
			<td><?php echo str_replace(";; ", "<br>", $logEstudiante -> getTime()) ?></td>
		</tr>
		<tr>
			<th>Ip</th>
			<td><?php echo str_replace(";; ", "<br>", $logEstudiante -> getIp()) ?></td>
		</tr>
		<tr>
			<th>Os</th>
			<td><?php echo str_replace(";; ", "<br>", $logEstudiante -> getOs()) ?></td>
		</tr>
		<tr>
			<th>Browser</th>
			<td><?php echo str_replace(";; ", "<br>", $logEstudiante -> getBrowser()) ?></td>
		</tr>
	</table>
</div>
