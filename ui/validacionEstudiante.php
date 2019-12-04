<?php
if(isset($_SESSION['id'])){
    if($_SESSION['entity'] == "Estudiante"){
        $estudiante = new Estudiante($_SESSION['id']);
        $estudiante -> select();
        if($estudiante -> getState() == 0) {
            header('Location: index.php');            
        }
    }else{
        $pid = base64_encode("error.php");
        header('Location: index.php?pid='. $pid);
    }
}else{
    header('Location: index.php');
}
?>