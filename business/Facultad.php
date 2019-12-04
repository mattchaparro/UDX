<?php
require_once ("persistence/FacultadDAO.php");
require_once ("persistence/Connection.php");

class Facultad {
    
	private $idFacultad;
	private $nombre;
	private $facultadDAO;
	private $connection;

	function getIdFacultad() {
		return $this -> idFacultad;
	}

	function setIdFacultad($pIdFacultad) {
		$this -> idFacultad = $pIdFacultad;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function __construct($pIdFacultad = "", $pNombre = ""){
		$this -> idFacultad = $pIdFacultad;
		$this -> nombre = $pNombre;
		$this -> facultadDAO = new FacultadDAO($this -> idFacultad, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> facultadDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> facultadDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> facultadDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idFacultad = $result[0];
		$this -> nombre = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> facultadDAO -> selectAll());
		$facultads = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($facultads, new Facultad($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $facultads;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> facultadDAO -> selectAllOrder($order, $dir));
		$facultads = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($facultads, new Facultad($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $facultads;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> facultadDAO -> search($search));
		$facultads = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($facultads, new Facultad($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $facultads;
	}
}
?>
