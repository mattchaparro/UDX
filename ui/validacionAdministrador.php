<?php
if(isset($_SESSION['id'])){
    if($_SESSION['entity'] == "Administrador"){
        $administrador = new Administrator($_SESSION['id']);
        $administrador -> select();
        if($administrador -> getState() == 0) {
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