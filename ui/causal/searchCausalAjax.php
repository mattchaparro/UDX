<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Descripcion</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$causal = new Causal();
		$causals = $causal -> search($_GET['search']);
		$counter = 1;
		foreach ($causals as $currentCausal) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCausal -> getDescripcion()) . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/causal/updateCausal.php") . "&idCausal=" . $currentCausal -> getIdCausal() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Causal' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/reportePublicacion/selectAllReportePublicacionByCausal.php") . "&idCausal=" . $currentCausal -> getIdCausal() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Reporte Publicacion' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/reportePublicacion/insertReportePublicacion.php") . "&idCausal=" . $currentCausal -> getIdCausal() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Reporte Publicacion' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
