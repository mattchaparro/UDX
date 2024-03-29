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
			<h4 class="card-title">Get All Asignatura</h4>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Nombre 
						<?php if($order=="nombre" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/asignatura/selectAllAsignatura.php") ?>&order=nombre&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="nombre" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/asignatura/selectAllAsignatura.php") ?>&order=nombre&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$asignatura = new Asignatura();
					if($order != "" && $dir != "") {
						$asignaturas = $asignatura -> selectAllOrder($order, $dir);
					} else {
						$asignaturas = $asignatura -> selectAll();
					}
					$counter = 1;
					foreach ($asignaturas as $currentAsignatura) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentAsignatura -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/asignatura/updateAsignatura.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Asignatura' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/publicacion/selectAllPublicacionByAsignatura.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Publicacion' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/publicacion/insertPublicacion.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Publicacion' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/asignaturaPrograma/selectAllAsignaturaProgramaByAsignatura.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Asignatura Programa' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/asignaturaPrograma/insertAsignaturaPrograma.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Asignatura Programa' ></span></a> ";
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
