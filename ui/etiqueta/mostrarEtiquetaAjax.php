<?php
session_start();

if(isset($_SESSION['allEtiquetas'])){
   $arreglo = $_SESSION['allEtiquetas'];
   $i=0;
   foreach($arreglo as $e){
      $datos = explode("-", $e);
    ?>
    <span class="badge badge-primary px-2 rounded">
        <div>
            <span><?php echo $datos[0] ?></span>
            <button type="button" class="btn btn-primary m-0 p-0" onclick="eliminarEtiqueta(<?php echo $i ?>)">&times;</button>
        </div>
    </span>
   <?php
   $i++;
   }
}

?>

<script>
      function eliminarEtiqueta(indice){
         console.log(indice);
      $.ajax({
			type: "POST",
			data: {indice},
			url: "index.php?pid=<?php echo base64_encode("ui/etiqueta/eliminarEtiqueta.php");?>",
			success: function(res){
				$("#etiquetasPregunta").load("indexAjax.php?pid=<?php echo base64_encode("ui/etiqueta/mostrarEtiquetaAjax.php");?>");
			}
		});
	
      };
   
</script>
