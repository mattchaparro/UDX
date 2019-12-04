<?php
class AsignaturaProgramaDAO{
    
	private $idAsignaturaPrograma;
	private $programaAcademico;
	private $asignatura;

	function __construct($pIdAsignaturaPrograma = "", $pProgramaAcademico = "", $pAsignatura = ""){
		$this -> idAsignaturaPrograma = $pIdAsignaturaPrograma;
		$this -> programaAcademico = $pProgramaAcademico;
		$this -> asignatura = $pAsignatura;
	}

	function insert(){
		return "insert into asignaturaprograma (programaAcademico_idProgramaAcademico, asignatura_idAsignatura)
				values('" . $this -> programaAcademico . "', '" . $this -> asignatura . "')";
	}

	function update(){
		return "update asignaturaprograma set 
				programaAcademico_idProgramaAcademico = '" . $this -> programaAcademico . "',
				asignatura_idAsignatura = '" . $this -> asignatura . "'	
				where idAsignaturaPrograma = '" . $this -> idAsignaturaPrograma . "'";
	}

	function select() {
		return "select idAsignaturaPrograma, programaAcademico_idProgramaAcademico, asignatura_idAsignatura
				from asignaturaprograma
				where idAsignaturaPrograma = '" . $this -> idAsignaturaPrograma . "'";
	}

	function selectAll() {
		return "select idAsignaturaPrograma, programaAcademico_idProgramaAcademico, asignatura_idAsignatura
				from asignaturaprograma";
	}

	function selectAllByProgramaAcademico() {
		return "select idAsignaturaPrograma, programaAcademico_idProgramaAcademico, asignatura_idAsignatura
				from asignaturaprograma
				where programaAcademico_idProgramaAcademico = '" . $this -> programaAcademico . "'";
	}

	function selectAllByAsignatura() {
		return "select idAsignaturaPrograma, programaAcademico_idProgramaAcademico, asignatura_idAsignatura
				from asignaturaprograma
				where asignatura_idAsignatura = '" . $this -> asignatura . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idAsignaturaPrograma, programaAcademico_idProgramaAcademico, asignatura_idAsignatura
				from asignaturaprograma
				order by " . $orden . " " . $dir;
	}

	function selectAllByProgramaAcademicoOrder($orden, $dir) {
		return "select idAsignaturaPrograma, programaAcademico_idProgramaAcademico, asignatura_idAsignatura
				from asignaturaprograma
				where programaAcademico_idProgramaAcademico = '" . $this -> programaAcademico . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByAsignaturaOrder($orden, $dir) {
		return "select idAsignaturaPrograma, programaAcademico_idProgramaAcademico, asignatura_idAsignatura
				from asignaturaprograma
				where asignatura_idAsignatura = '" . $this -> asignatura . "'
				order by " . $orden . " " . $dir;
	}
}
?>
