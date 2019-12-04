<?php

class TipoNotificacionDAO {

    private $idTipo;
    private $nombre;
    private $descripcion;
   
    function __construct($idTipo="",$nombre="", $descripcion=""){
        $this -> idTipo = $idTipo;
        $this -> nombre = $nombre;
        $this -> descripcion = $descripcion; 
    }

    function select(){
        return "select * from tiponotificacion
                where idTipoNotificacion = '" . $this -> idTipo . "'";
    }
}

?>