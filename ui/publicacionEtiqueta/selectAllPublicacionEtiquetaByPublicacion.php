<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$publicacion = new Publicacion($_GET['idPublicacion']); 
$publicacion -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Publicacion Etiqueta of Publicacion: <em><?php echo $publicacion -> getTitulo() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th>Publicacion</th>
						<th>Etiqueta</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$publicacionEtiqueta = new PublicacionEtiqueta("", $_GET['idPublicacion'], "");
					if($order!="" && $dir!="") {
						$publicacionEtiquetas = $publicacionEtiqueta -> selectAllByPublicacionOrder($order, $dir);
					} else {
						$publicacionEtiquetas = $publicacionEtiqueta -> selectAllByPublicacion();
					}
					$counter = 1;
					foreach ($publicacionEtiquetas as $currentPublicacionEtiqueta) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentPublicacionEtiqueta -> getPublicacion() -> getTitulo() . "</td>";
						echo "<td>" . $currentPublicacionEtiqueta -> getEtiqueta() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/publicacionEtiqueta/updatePublicacionEtiqueta.php") . "&idPublicacionEtiqueta=" . $currentPublicacionEtiqueta -> getIdPublicacionEtiqueta() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Publicacion Etiqueta' ></span></a> ";
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
