<?php
require_once ("persistence/ProgramaAcademicoDAO.php");
require_once ("persistence/Connection.php");

class ProgramaAcademico {
    
	private $idProgramaAcademico;
	private $nombre;
	private $facultad;
	private $programaAcademicoDAO;
	private $connection;

	function getIdProgramaAcademico() {
		return $this -> idProgramaAcademico;
	}

	function setIdProgramaAcademico($pIdProgramaAcademico) {
		$this -> idProgramaAcademico = $pIdProgramaAcademico;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getFacultad() {
		return $this -> facultad;
	}

	function setFacultad($pFacultad) {
		$this -> facultad = $pFacultad;
	}

	function __construct($pIdProgramaAcademico = "", $pNombre = "", $pFacultad = ""){
		$this -> idProgramaAcademico = $pIdProgramaAcademico;
		$this -> nombre = $pNombre;
		$this -> facultad = $pFacultad;
		$this -> programaAcademicoDAO = new ProgramaAcademicoDAO($this -> idProgramaAcademico, $this -> nombre, $this -> facultad);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> programaAcademicoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> programaAcademicoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> programaAcademicoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idProgramaAcademico = $result[0];
		$this -> nombre = $result[1];
		$facultad = new Facultad($result[2]);
		$facultad -> select();
		$this -> facultad = $facultad;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> programaAcademicoDAO -> selectAll());
		$programaAcademicos = array();
		while ($result = $this -> connection -> fetchRow()){
			$facultad = new Facultad($result[2]);
			$facultad -> select();
			array_push($programaAcademicos, new ProgramaAcademico($result[0], $result[1], $facultad));
		}
		$this -> connection -> close();
		return $programaAcademicos;
	}

	function selectAllByFacultad(){
		$this -> connection -> open();
		$this -> connection -> run($this -> programaAcademicoDAO -> selectAllByFacultad());
		$programaAcademicos = array();
		while ($result = $this -> connection -> fetchRow()){
			$facultad = new Facultad($result[2]);
			$facultad -> select();
			array_push($programaAcademicos, new ProgramaAcademico($result[0], $result[1], $facultad));
		}
		$this -> connection -> close();
		return $programaAcademicos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> programaAcademicoDAO -> selectAllOrder($order, $dir));
		$programaAcademicos = array();
		while ($result = $this -> connection -> fetchRow()){
			$facultad = new Facultad($result[2]);
			$facultad -> select();
			array_push($programaAcademicos, new ProgramaAcademico($result[0], $result[1], $facultad));
		}
		$this -> connection -> close();
		return $programaAcademicos;
	}

	function selectAllByFacultadOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> programaAcademicoDAO -> selectAllByFacultadOrder($order, $dir));
		$programaAcademicos = array();
		while ($result = $this -> connection -> fetchRow()){
			$facultad = new Facultad($result[2]);
			$facultad -> select();
			array_push($programaAcademicos, new ProgramaAcademico($result[0], $result[1], $facultad));
		}
		$this -> connection -> close();
		return $programaAcademicos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> programaAcademicoDAO -> search($search));
		$programaAcademicos = array();
		while ($result = $this -> connection -> fetchRow()){
			$facultad = new Facultad($result[2]);
			$facultad -> select();
			array_push($programaAcademicos, new ProgramaAcademico($result[0], $result[1], $facultad));
		}
		$this -> connection -> close();
		return $programaAcademicos;
	}
}
?>
