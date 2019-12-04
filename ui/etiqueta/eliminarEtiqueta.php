<?php
$indice = $_POST["indice"];
$datosEtiquetas = $_SESSION['allEtiquetas'][$indice];
unset($_SESSION['allEtiquetas'][$indice]);
$datos = array_values($_SESSION['allEtiquetas']);
unset($_SESSION['allEtiquetas']);
$_SESSION['allEtiquetas'] = $datos;


?>