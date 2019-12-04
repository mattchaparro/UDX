<?php
require_once ("persistence/Connection.php");
require_once ("persistence/TipoNotificacionDAO.php");

class TipoNotificacion {

    private $idTipo;
    private $nombre;
    private $descripcion;
    private $connection;
    private $tipoNotificacionDAO;

    function __construct($idTipo="",$nombre="", $descripcion=""){
        $this -> idTipo = $idTipo;
        $this -> nombre = $nombre;
        $this -> descripcion = $descripcion;
        $this -> tipoNotificacionDAO = new TipoNotificacionDAO($this -> idTipo, $this -> nombre,  $this -> descripcion);
        $this -> connection = new Connection;
    }

    function getIdTipo(){
        return $this -> idTipo;
    }

    function getNombre(){
        return $this -> nombre;
    }

    function getDescripcion(){
        return $this -> descripcion;
    }

    function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoNotificacionDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idTipo = $result[0];
		$this -> nombre = $result[1];
		$this -> descripcion = $result[2];
	}
}

?>