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
		$etiqueta = new Etiqueta();
		$etiquetas = $etiqueta -> search($_GET['search']);
		$counter = 1;
		foreach ($etiquetas as $currentEtiqueta) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEtiqueta -> getNombre()) . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/etiqueta/updateEtiqueta.php") . "&idEtiqueta=" . $currentEtiqueta -> getIdEtiqueta() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Etiqueta' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/publicacionEtiqueta/selectAllPublicacionEtiquetaByEtiqueta.php") . "&idEtiqueta=" . $currentEtiqueta -> getIdEtiqueta() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Publicacion Etiqueta' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/publicacionEtiqueta/insertPublicacionEtiqueta.php") . "&idEtiqueta=" . $currentEtiqueta -> getIdEtiqueta() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Publicacion Etiqueta' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
