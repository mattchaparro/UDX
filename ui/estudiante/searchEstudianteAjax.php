<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Codigo</th>
			<th nowrap>Nombre</th>
			<th nowrap>Apellido</th>
			<th nowrap>Correo</th>
			<th nowrap>Fecha_registro</th>
			<th nowrap>Fecha_actualizacion</th>
			<th nowrap>Foto</th>
			<th nowrap>Telefono</th>
			<th nowrap>Puntaje</th>
			<th nowrap>Token</th>
			<th>Programa Academico</th>
			<th>Rango</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$estudiante = new Estudiante();
		$estudiantes = $estudiante -> search($_GET['search']);
		$counter = 1;
		foreach ($estudiantes as $currentEstudiante) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getCodigo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getApellido()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getCorreo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getFecha_registro()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getFecha_actualizacion()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getFoto()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getTelefono()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getPuntaje()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getToken()) . "</td>";
			echo "<td>" . $currentEstudiante -> getProgramaAcademico() -> getNombre() . "</td>";
			echo "<td>" . $currentEstudiante -> getRango() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						echo "<a href='modalEstudiante.php?idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'  data-toggle='modal' data-target='#modalEstudiante' ><span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='View more information' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/updateEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Estudiante' ></span></a> ";
							echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/updateFotoEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "&attribute=foto'><span class='fas fa-camera' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit foto'></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/publicacion/selectAllPublicacionByEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Publicacion' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/publicacion/insertPublicacion.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Publicacion' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/reportePublicacion/selectAllReportePublicacionByEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Reporte Publicacion' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/reportePublicacion/insertReportePublicacion.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Reporte Publicacion' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
<div class="modal fade" id="modalEstudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>
