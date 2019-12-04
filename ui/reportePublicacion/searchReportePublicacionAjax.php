<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Fecha Reporte</th>
			<th>Estudiante</th>
			<th>Publicacion</th>
			<th>Causal</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$reportePublicacion = new ReportePublicacion();
		$reportePublicacions = $reportePublicacion -> search($_GET['search']);
		$counter = 1;
		foreach ($reportePublicacions as $currentReportePublicacion) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentReportePublicacion -> getFechaReporte()) . "</td>";
			echo "<td>" . $currentReportePublicacion -> getEstudiante() -> getNombre() . " " . $currentReportePublicacion -> getEstudiante() -> getApellido() . "</td>";
			echo "<td>" . $currentReportePublicacion -> getPublicacion() -> getTitulo() . "</td>";
			echo "<td>" . $currentReportePublicacion -> getCausal() -> getDescripcion() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/reportePublicacion/updateReportePublicacion.php") . "&idReportePublicacion=" . $currentReportePublicacion -> getIdReportePublicacion() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Reporte Publicacion' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
