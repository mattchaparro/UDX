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
$idPublicacion = $_GET ['idPublicacion'];
$publicacion = new Publicacion($idPublicacion);
$publicacion -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Publicacion</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Titulo</th>
			<td><?php echo $publicacion -> getTitulo() ?></td>
		</tr>
		<tr>
			<th>Descripcion</th>
			<td><?php echo $publicacion -> getDescripcion() ?></td>
		</tr>
		<tr>
			<th>Anexo</th>
			<td><?php echo $publicacion -> getAnexo() ?></td>
		</tr>
		<tr>
			<th>Fecha</th>
			<td><?php echo $publicacion -> getFecha() ?></td>
		</tr>
		<tr>
			<th>Voto Positivo</th>
			<td><?php echo $publicacion -> getVotoPositivo() ?></td>
		</tr>
		<tr>
			<th>Voto Negativo</th>
			<td><?php echo $publicacion -> getVotoNegativo() ?></td>
		</tr>
		<tr>
			<th>Id Respuesta</th>
			<td><?php echo $publicacion -> getIdRespuesta() ?></td>
		</tr>
	</table>
</div>
