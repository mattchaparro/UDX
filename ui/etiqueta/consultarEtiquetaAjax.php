<?php
$filtro = $_GET['etiqueta'];
if($filtro != "-1"){
    $etiqueta = new Etiqueta();
    $etiquetas = $etiqueta -> search($filtro);
    if(count($etiquetas) > 0){
        echo "<div class='list-group'>";
        foreach ($etiquetas as $e){
            echo "<button type='button' id='e". $e->getIdEtiqueta() ."' class='list-group-item list-group-item-action btn btn-sm'> ". $e -> getNombre(). "</button>";
        }
        echo "</div>";
    }else{
        echo "<div class='py-2 d-flex align-items-center'>
                <span class='mr-2'>¿No se encuentra la etiqueta?</span>
                <a href='index.php?pid=" . base64_encode("ui/estudiante/adicionarEtiqueta.php") . "' target='_blank'>Añadir</a>
             </div>";
        
        echo "<script>
               $('#idEtiqueta').val('');
            </script>";
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
               echo "$(\"#etiqueta_pregunta\").val(\"" . $e -> getNombre() . "\");\n";
               echo "$(\"#idEtiqueta\").val(\"" . $e -> getIdEtiqueta() . "\");\n";
               echo "$(\"#etiquetas\").hide();";
               echo "});\n";
           }
        ?>
    });
</script>
