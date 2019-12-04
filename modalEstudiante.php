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
$idEstudiante = $_GET ['idEstudiante'];
$estudiante = new Estudiante($idEstudiante);
$estudiante -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Estudiante</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Codigo</th>
			<td><?php echo $estudiante -> getCodigo() ?></td>
		</tr>
		<tr>
			<th>Nombre</th>
			<td><?php echo $estudiante -> getNombre() ?></td>
		</tr>
		<tr>
			<th>Apellido</th>
			<td><?php echo $estudiante -> getApellido() ?></td>
		</tr>
		<tr>
			<th>Correo</th>
			<td><?php echo $estudiante -> getCorreo() ?></td>
		</tr>
		<tr>
			<th>Fecha_registro</th>
			<td><?php echo $estudiante -> getFecha_registro() ?></td>
		</tr>
		<tr>
			<th>Fecha_actualizacion</th>
			<td><?php echo $estudiante -> getFecha_actualizacion() ?></td>
		</tr>
		<tr>
			<th>Foto</th>
				<td><img class="rounded" src="<?php echo $estudiante -> getFoto() ?>" height="300px" /></td>
		</tr>
		<tr>
			<th>Telefono</th>
			<td><?php echo $estudiante -> getTelefono() ?></td>
		</tr>
		<tr>
			<th>Puntaje</th>
			<td><?php echo $estudiante -> getPuntaje() ?></td>
		</tr>
		<tr>
			<th>Token</th>
			<td><?php echo $estudiante -> getToken() ?></td>
		</tr>
		<tr>
			<th>State</th>
			<td><?php echo $estudiante -> getState() ?></td>
		</tr>
	</table>
</div>
