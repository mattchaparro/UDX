<?php
require_once ("persistence/AsignaturaProgramaDAO.php");
require_once ("persistence/Connection.php");

class AsignaturaPrograma {
    
	private $idAsignaturaPrograma;
	private $programaAcademico;
	private $asignatura;
	private $asignaturaProgramaDAO;
	private $connection;

	function getIdAsignaturaPrograma() {
		return $this -> idAsignaturaPrograma;
	}

	function setIdAsignaturaPrograma($pIdAsignaturaPrograma) {
		$this -> idAsignaturaPrograma = $pIdAsignaturaPrograma;
	}

	function getProgramaAcademico() {
		return $this -> programaAcademico;
	}

	function setProgramaAcademico($pProgramaAcademico) {
		$this -> programaAcademico = $pProgramaAcademico;
	}

	function getAsignatura() {
		return $this -> asignatura;
	}

	function setAsignatura($pAsignatura) {
		$this -> asignatura = $pAsignatura;
	}

	function __construct($pIdAsignaturaPrograma = "", $pProgramaAcademico = "", $pAsignatura = ""){
		$this -> idAsignaturaPrograma = $pIdAsignaturaPrograma;
		$this -> programaAcademico = $pProgramaAcademico;
		$this -> asignatura = $pAsignatura;
		$this -> asignaturaProgramaDAO = new AsignaturaProgramaDAO($this -> idAsignaturaPrograma, $this -> programaAcademico, $this -> asignatura);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaProgramaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaProgramaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaProgramaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idAsignaturaPrograma = $result[0];
		$programaAcademico = new ProgramaAcademico($result[1]);
		$programaAcademico -> select();
		$this -> programaAcademico = $programaAcademico;
		$asignatura = new Asignatura($result[2]);
		$asignatura -> select();
		$this -> asignatura = $asignatura;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaProgramaDAO -> selectAll());
		$asignaturaProgramas = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[1]);
			$programaAcademico -> select();
			$asignatura = new Asignatura($result[2]);
			$asignatura -> select();
			array_push($asignaturaProgramas, new AsignaturaPrograma($result[0], $programaAcademico, $asignatura));
		}
		$this -> connection -> close();
		return $asignaturaProgramas;
	}

	function selectAllByProgramaAcademico(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaProgramaDAO -> selectAllByProgramaAcademico());
		$asignaturaProgramas = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[1]);
			$programaAcademico -> select();
			$asignatura = new Asignatura($result[2]);
			$asignatura -> select();
			array_push($asignaturaProgramas, new AsignaturaPrograma($result[0], $programaAcademico, $asignatura));
		}
		$this -> connection -> close();
		return $asignaturaProgramas;
	}

	function selectAllByAsignatura(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaProgramaDAO -> selectAllByAsignatura());
		$asignaturaProgramas = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[1]);
			$programaAcademico -> select();
			$asignatura = new Asignatura($result[2]);
			$asignatura -> select();
			array_push($asignaturaProgramas, new AsignaturaPrograma($result[0], $programaAcademico, $asignatura));
		}
		$this -> connection -> close();
		return $asignaturaProgramas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaProgramaDAO -> selectAllOrder($order, $dir));
		$asignaturaProgramas = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[1]);
			$programaAcademico -> select();
			$asignatura = new Asignatura($result[2]);
			$asignatura -> select();
			array_push($asignaturaProgramas, new AsignaturaPrograma($result[0], $programaAcademico, $asignatura));
		}
		$this -> connection -> close();
		return $asignaturaProgramas;
	}

	function selectAllByProgramaAcademicoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaProgramaDAO -> selectAllByProgramaAcademicoOrder($order, $dir));
		$asignaturaProgramas = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[1]);
			$programaAcademico -> select();
			$asignatura = new Asignatura($result[2]);
			$asignatura -> select();
			array_push($asignaturaProgramas, new AsignaturaPrograma($result[0], $programaAcademico, $asignatura));
		}
		$this -> connection -> close();
		return $asignaturaProgramas;
	}

	function selectAllByAsignaturaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaProgramaDAO -> selectAllByAsignaturaOrder($order, $dir));
		$asignaturaProgramas = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[1]);
			$programaAcademico -> select();
			$asignatura = new Asignatura($result[2]);
			$asignatura -> select();
			array_push($asignaturaProgramas, new AsignaturaPrograma($result[0], $programaAcademico, $asignatura));
		}
		$this -> connection -> close();
		return $asignaturaProgramas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaProgramaDAO -> search($search));
		$asignaturaProgramas = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[1]);
			$programaAcademico -> select();
			$asignatura = new Asignatura($result[2]);
			$asignatura -> select();
			array_push($asignaturaProgramas, new AsignaturaPrograma($result[0], $programaAcademico, $asignatura));
		}
		$this -> connection -> close();
		return $asignaturaProgramas;
	}
}
?>
