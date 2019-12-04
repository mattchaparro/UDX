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
$idAdministrator = $_GET ['idAdministrator'];
$administrator = new Administrator($idAdministrator);
$administrator -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Administrator</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Name</th>
			<td><?php echo $administrator -> getName() ?></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><?php echo $administrator -> getLastName() ?></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><?php echo $administrator -> getEmail() ?></td>
		</tr>
		<tr>
			<th>Picture</th>
				<td><img class="rounded" src="<?php echo $administrator -> getPicture() ?>" height="300px" /></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><?php echo $administrator -> getPhone() ?></td>
		</tr>
		<tr>
			<th>Mobile</th>
			<td><?php echo $administrator -> getMobile() ?></td>
		</tr>
		<tr>
			<th>State</th>
			<td><?php echo $administrator -> getState() ?></td>
		</tr>
	</table>
</div>
