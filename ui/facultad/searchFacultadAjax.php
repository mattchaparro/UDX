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
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$facultad = new Facultad();
		$facultads = $facultad -> search($_GET['search']);
		$counter = 1;
		foreach ($facultads as $currentFacultad) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentFacultad -> getNombre()) . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/facultad/updateFacultad.php") . "&idFacultad=" . $currentFacultad -> getIdFacultad() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Facultad' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/programaAcademico/selectAllProgramaAcademicoByFacultad.php") . "&idFacultad=" . $currentFacultad -> getIdFacultad() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Programa Academico' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/programaAcademico/insertProgramaAcademico.php") . "&idFacultad=" . $currentFacultad -> getIdFacultad() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Programa Academico' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
