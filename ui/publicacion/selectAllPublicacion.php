<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Publicacion</h4>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Titulo 
						<?php if($order=="titulo" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=titulo&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="titulo" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=titulo&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Anexo 
						<?php if($order=="anexo" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=anexo&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="anexo" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=anexo&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Fecha 
						<?php if($order=="fecha" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=fecha&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="fecha" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=fecha&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Voto Positivo 
						<?php if($order=="votoPositivo" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=votoPositivo&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="votoPositivo" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=votoPositivo&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Voto Negativo 
						<?php if($order=="votoNegativo" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=votoNegativo&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="votoNegativo" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=votoNegativo&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Id Respuesta 
						<?php if($order=="idRespuesta" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=idRespuesta&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="idRespuesta" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/publicacion/selectAllPublicacion.php") ?>&order=idRespuesta&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th>Estudiante</th>
						<th>Asignatura</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$publicacion = new Publicacion();
					if($order != "" && $dir != "") {
						$publicacions = $publicacion -> selectAllOrder($order, $dir);
					} else {
						$publicacions = $publicacion -> selectAll();
					}
					$counter = 1;
					foreach ($publicacions as $currentPublicacion) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentPublicacion -> getTitulo() . "</td>";
						echo "<td>" . $currentPublicacion -> getAnexo() . "</td>";
						echo "<td>" . $currentPublicacion -> getFecha() . "</td>";
						echo "<td>" . $currentPublicacion -> getVotoPositivo() . "</td>";
						echo "<td>" . $currentPublicacion -> getVotoNegativo() . "</td>";
						echo "<td>" . $currentPublicacion -> getIdRespuesta() . "</td>";
						echo "<td>" . $currentPublicacion -> getEstudiante() -> getNombre() . " " . $currentPublicacion -> getEstudiante() -> getApellido() . "</td>";
						echo "<td>" . $currentPublicacion -> getAsignatura() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						echo "<a href='modalPublicacion.php?idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'  data-toggle='modal' data-target='#modalPublicacion' ><span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='View more information' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/publicacion/updatePublicacion.php") . "&idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Publicacion' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/publicacionEtiqueta/selectAllPublicacionEtiquetaByPublicacion.php") . "&idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Publicacion Etiqueta' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/publicacionEtiqueta/insertPublicacionEtiqueta.php") . "&idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Publicacion Etiqueta' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/reportePublicacion/selectAllReportePublicacionByPublicacion.php") . "&idPublicacion=" . $currentPublicacion -> getIdPublicacion() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Reporte Publicacion' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
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
		</div>
	</div>
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
