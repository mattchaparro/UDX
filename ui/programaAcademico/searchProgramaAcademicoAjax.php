<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Nombre</th>
			<th>Facultad</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$programaAcademico = new ProgramaAcademico();
		$programaAcademicos = $programaAcademico -> search($_GET['search']);
		$counter = 1;
		foreach ($programaAcademicos as $currentProgramaAcademico) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProgramaAcademico -> getNombre()) . "</td>";
			echo "<td>" . $currentProgramaAcademico -> getFacultad() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/programaAcademico/updateProgramaAcademico.php") . "&idProgramaAcademico=" . $currentProgramaAcademico -> getIdProgramaAcademico() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Programa Academico' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/selectAllEstudianteByProgramaAcademico.php") . "&idProgramaAcademico=" . $currentProgramaAcademico -> getIdProgramaAcademico() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Estudiante' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/insertEstudiante.php") . "&idProgramaAcademico=" . $currentProgramaAcademico -> getIdProgramaAcademico() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Estudiante' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/asignaturaPrograma/selectAllAsignaturaProgramaByProgramaAcademico.php") . "&idProgramaAcademico=" . $currentProgramaAcademico -> getIdProgramaAcademico() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Asignatura Programa' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
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
