<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Action</th>
			<th nowrap>Date</th>
			<th nowrap>Time</th>
			<th nowrap>Ip</th>
			<th nowrap>Os</th>
			<th nowrap>Browser</th>
			<th>Estudiante</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$logEstudiante = new LogEstudiante();
		$logEstudiantes = $logEstudiante -> search($_GET['search']);
		$counter = 1;
		foreach ($logEstudiantes as $currentLogEstudiante) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogEstudiante -> getAction()) . "</td>";
			echo "<td nowrap>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogEstudiante -> getDate()) . "</td>";
			echo "<td nowrap>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogEstudiante -> getTime()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogEstudiante -> getIp()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogEstudiante -> getOs()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogEstudiante -> getBrowser()) . "</td>";
			echo "<td>" . $currentLogEstudiante -> getEstudiante() -> getNombre() . " " . $currentLogEstudiante -> getEstudiante() -> getApellido() . "</td>";
			echo "<td class='text-right' nowrap>
				<a href='modalLogEstudiante.php?idLogEstudiante=" . $currentLogEstudiante -> getIdLogEstudiante() . "'  data-toggle='modal' data-target='#modalLogEstudiante' >
					<span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='View more information' ></span>
				</a>
				</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
<div class="modal fade" id="modalLogEstudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
