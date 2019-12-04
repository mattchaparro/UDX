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
			<h4 class="card-title">Get All Programa Academico</h4>
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
							<a href='index.php?pid=<?php echo base64_encode("ui/programaAcademico/selectAllProgramaAcademico.php") ?>&order=nombre&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="nombre" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/programaAcademico/selectAllProgramaAcademico.php") ?>&order=nombre&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th>Facultad</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$programaAcademico = new ProgramaAcademico();
					if($order != "" && $dir != "") {
						$programaAcademicos = $programaAcademico -> selectAllOrder($order, $dir);
					} else {
						$programaAcademicos = $programaAcademico -> selectAll();
					}
					$counter = 1;
					foreach ($programaAcademicos as $currentProgramaAcademico) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentProgramaAcademico -> getNombre() . "</td>";
						echo "<td>" . $currentProgramaAcademico -> getFacultad() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/programaAcademico/updateProgramaAcademico.php") . "&idProgramaAcademico=" . $currentProgramaAcademico -> getIdProgramaAcademico() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Programa Academico' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/selectAllEstudianteByProgramaAcademico.php") . "&idProgramaAcademico=" . $currentProgramaAcademico -> getIdProgramaAcademico() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Estudiante' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/insertEstudiante.php") . "&idProgramaAcademico=" . $currentProgramaAcademico -> getIdProgramaAcademico() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Estudiante' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/asignaturaPrograma/selectAllAsignaturaProgramaByProgramaAcademico.php") . "&idProgramaAcademico=" . $currentProgramaAcademico -> getIdProgramaAcademico() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Asignatura Programa' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/asignaturaPrograma/insertAsignaturaPrograma.php") . "&idProgramaAcademico=" . $currentProgramaAcademico -> getIdProgramaAcademico() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Asignatura Programa' ></span></a> ";
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
