<?php
require_once ("persistence/AsignaturaDAO.php");
require_once ("persistence/Connection.php");

class Asignatura {
    
	private $idAsignatura;
	private $nombre;
	private $asignaturaDAO;
	private $connection;

	function getIdAsignatura() {
		return $this -> idAsignatura;
	}

	function setIdAsignatura($pIdAsignatura) {
		$this -> idAsignatura = $pIdAsignatura;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function __construct($pIdAsignatura = "", $pNombre = ""){
		$this -> idAsignatura = $pIdAsignatura;
		$this -> nombre = $pNombre;
		$this -> asignaturaDAO = new AsignaturaDAO($this -> idAsignatura, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idAsignatura = $result[0];
		$this -> nombre = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> selectAll());
		$asignaturas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($asignaturas, new Asignatura($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $asignaturas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> selectAllOrder($order, $dir));
		$asignaturas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($asignaturas, new Asignatura($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $asignaturas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> search($search));
		$asignaturas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($asignaturas, new Asignatura($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $asignaturas;
	}
}
?>
