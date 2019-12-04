<?php
$filtro = $_GET['asignatura'];
if($filtro != "-1"){
    $asignatura = new Asignatura();
    $asignaturas = $asignatura -> search($filtro);
    if(count($asignaturas) > 0){
        echo "<div class='list-group'>";
        foreach ($asignaturas as $e){
            echo "<button type='button' id='e". $e -> getIdAsignatura() ."' class='list-group-item list-group-item-action btn btn-sm'> ". $e -> getNombre() . "</button>";
        }
        echo "</div>";
    }else{
        echo "<div class='py-2 d-flex align-items-center'>
                <span class='mr-2'>No se encontraron resultados</span>
             </div>";
        
        echo "<script>
               $('#idAsignatura').val('');
            </script>";
    }
}else{
    echo "";
}
?>

<script type="text/javascript">
    $(document).ready(function(){
        <?php
           foreach ($asignaturas as $e){
               echo "$(\"#e" . $e -> getIdAsignatura() . "\").click(function(){\n";
               echo "$(\"#asignatura_pregunta\").val(\"" . $e -> getNombre() . "\");\n";
               echo "$(\"#idAsignatura\").val(\"" . $e -> getIdAsignatura() . "\");\n";
               echo "$(\"#asignaturas\").hide();";
               echo "});\n";
           }
        ?>
    });
</script>