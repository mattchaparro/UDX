<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Titulo</th>
			<th nowrap>Anexo</th>
			<th nowrap>Fecha</th>
			<th nowrap>Voto Positivo</th>
			<th nowrap>Voto Negativo</th>
			<th nowrap>Id Respuesta</th>
			<th>Estudiante</th>
			<th>Asignatura</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$publicacion = new Publicacion();
		$publicacions = $publicacion -> search($_GET['search']);
		$counter = 1;
		foreach ($publicacions as $currentPublicacion) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPublicacion -> getTitulo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPublicacion -> getAnexo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPublicacion -> getFecha()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPublicacion -> getVotoPositivo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPublicacion -> getVotoNegativo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPublicacion -> getIdRespuesta()) . "</td>";
			echo "<td>" . $currentPublicacion -> getEstudiante() -> getNombre() . " " . $currentPublicacion -> getEstudiante() -> getApellido() . "</td>";
			echo "<td>" . $currentPublicacion -> getAsignatura() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						echo "<a href='modalPublicacion.php?idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'  data-toggle='modal' data-target='#modalPublicacion' ><span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='View more information' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/publicacion/updatePublicacion.php") . "&idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Publicacion' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/publicacionEtiqueta/selectAllPublicacionEtiquetaByPublicacion.php") . "&idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Publicacion Etiqueta' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/publicacionEtiqueta/insertPublicacionEtiqueta.php") . "&idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Publicacion Etiqueta' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/reportePublicacion/selectAllReportePublicacionByPublicacion.php") . "&idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Reporte Publicacion' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/reportePublicacion/insertReportePublicacion.php") . "&idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Reporte Publicacion' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
<div class="modal fade" id="modalPublicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
