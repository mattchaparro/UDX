<?php

if(isset($_POST['id'])){
    
    $id = $_POST['id'];
    $etiqueta = new Etiqueta($id);
    $etiqueta -> select();
    $badge = $etiqueta ->getNombre(). "-" . $etiqueta -> getIdEtiqueta();
    
    session_start();
    if(isset($_SESSION['allEtiquetas'])){
        if(!comprobarEtiqueta($_SESSION['allEtiquetas'], $id)){
            array_push($_SESSION['allEtiquetas'], $badge);   
        }
    }else{
         $_SESSION['allEtiquetas'] = array();
         array_push( $_SESSION['allEtiquetas'], $badge);
        
    }
}

function comprobarEtiqueta($etiquetas, $id){
    $val = false;
    foreach($etiquetas as $e){
        $datos = explode("-", $e);
        if($datos[1] == $id){
            $val = true;
        }
    }
    return $val;
}

?>