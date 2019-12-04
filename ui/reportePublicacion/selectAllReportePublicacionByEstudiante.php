<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$estudiante = new Estudiante($_GET['idEstudiante']); 
$estudiante -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Reporte Publicacion of Estudiante: <em><?php echo $estudiante -> getNombre() . " " . $estudiante -> getApellido() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Fecha Reporte 
						<?php if($order=="fechaReporte" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/reportePublicacion/selectAllReportePublicacionByEstudiante.php") ?>&idEstudiante=<?php echo $_GET['idEstudiante'] ?>&order=fechaReporte&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="fechaReporte" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/reportePublicacion/selectAllReportePublicacionByEstudiante.php") ?>&idEstudiante=<?php echo $_GET['idEstudiante'] ?>&order=fechaReporte&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Estudiante</th>
						<th>Publicacion</th>
						<th>Causal</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$reportePublicacion = new ReportePublicacion("", "", $_GET['idEstudiante'], "", "");
					if($order!="" && $dir!="") {
						$reportePublicacions = $reportePublicacion -> selectAllByEstudianteOrder($order, $dir);
					} else {
						$reportePublicacions = $reportePublicacion -> selectAllByEstudiante();
					}
					$counter = 1;
					foreach ($reportePublicacions as $currentReportePublicacion) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentReportePublicacion -> getFechaReporte() . "</td>";
						echo "<td>" . $currentReportePublicacion -> getEstudiante() -> getNombre() . " " . $currentReportePublicacion -> getEstudiante() -> getApellido() . "</td>";
						echo "<td>" . $currentReportePublicacion -> getPublicacion() -> getTitulo() . "</td>";
						echo "<td>" . $currentReportePublicacion -> getCausal() -> getDescripcion() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/reportePublicacion/updateReportePublicacion.php") . "&idReportePublicacion=" . $currentReportePublicacion -> getIdReportePublicacion() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Reporte Publicacion' ></span></a> ";
						}
						echo "</td>";
						echo "</tr>";
						$counter++;
					};
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
