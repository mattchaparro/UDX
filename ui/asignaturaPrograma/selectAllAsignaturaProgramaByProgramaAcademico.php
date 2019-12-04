<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$programaAcademico = new ProgramaAcademico($_GET['idProgramaAcademico']); 
$programaAcademico -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Asignatura Programa of Programa Academico: <em><?php echo $programaAcademico -> getNombre() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th>Programa Academico</th>
						<th>Asignatura</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$asignaturaPrograma = new AsignaturaPrograma("", $_GET['idProgramaAcademico'], "");
					if($order!="" && $dir!="") {
						$asignaturaProgramas = $asignaturaPrograma -> selectAllByProgramaAcademicoOrder($order, $dir);
					} else {
						$asignaturaProgramas = $asignaturaPrograma -> selectAllByProgramaAcademico();
					}
					$counter = 1;
					foreach ($asignaturaProgramas as $currentAsignaturaPrograma) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentAsignaturaPrograma -> getProgramaAcademico() -> getNombre() . "</td>";
						echo "<td>" . $currentAsignaturaPrograma -> getAsignatura() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/asignaturaPrograma/updateAsignaturaPrograma.php") . "&idAsignaturaPrograma=" . $currentAsignaturaPrograma -> getIdAsignaturaPrograma() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Asignatura Programa' ></span></a> ";
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
