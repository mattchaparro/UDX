<?php
$filtro = $_GET['etiqueta'];
if($filtro != "-1"){
    $etiqueta = new Etiqueta();
    $etiquetas = $etiqueta -> search($filtro);
    if(count($etiquetas)>0){
        echo "<div class='list-group'>";
        foreach ($etiquetas as $e){
            echo "<button type='button' id='e". $e->getIdEtiqueta() ."' class='list-group-item list-group-item-action btn-sm'> ". $e -> getNombre(). "</button>";
        }
        echo "</div>";
    }
}else{
    echo "";
}
?>

<script type="text/javascript">
    $(document).ready(function(){
        <?php
           foreach ($etiquetas as $e){
               echo "$(\"#e" . $e -> getIdEtiqueta() . "\").click(function(){\n";
               echo "$(\"#etiqueta_filtro\").val(\"" . $e -> getNombre() . "\");\n";
               echo "$(\"#idEtiquetaFiltro\").val(\"" . $e -> getIdEtiqueta() . "\");\n";
               echo "$(\"#etiquetas_filtro\").hide();";
               echo "});\n";

               
           }
        ?>
    });
</script>