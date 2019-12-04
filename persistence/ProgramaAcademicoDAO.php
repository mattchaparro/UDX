<?php
class ProgramaAcademicoDAO{
    
	private $idProgramaAcademico;
	private $nombre;
	private $facultad;

	function __construct($pIdProgramaAcademico = "", $pNombre = "", $pFacultad = ""){
		$this -> idProgramaAcademico = $pIdProgramaAcademico;
		$this -> nombre = $pNombre;
		$this -> facultad = $pFacultad;
	}

	function insert(){
		return "insert into programaacademico(nombre, facultad_idFacultad)
				values('" . $this -> nombre . "', '" . $this -> facultad . "')";
	}

	function update(){
		return "update programaacademico set 
				nombre = '" . $this -> nombre . "',
				facultad_idFacultad = '" . $this -> facultad . "'	
				where idProgramaAcademico = '" . $this -> idProgramaAcademico . "'";
	}

	function select() {
		return "select idProgramaAcademico, nombre, facultad_idFacultad
				from programaacademico
				where idProgramaAcademico = '" . $this -> idProgramaAcademico . "'";
	}

	function selectAll() {
		return "select idProgramaAcademico, nombre, facultad_idFacultad
				from programaacademico";
	}

	function selectAllByFacultad() {
		return "select idProgramaAcademico, nombre, facultad_idFacultad
				from programaacademico
				where facultad_idFacultad = '" . $this -> facultad . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idProgramaAcademico, nombre, facultad_idFacultad
				from ProgramaAcademico
				order by " . $orden . " " . $dir;
	}

	function selectAllByFacultadOrder($orden, $dir) {
		return "select idProgramaAcademico, nombre, facultad_idFacultad
				from programaacademico
				where facultad_idFacultad = '" . $this -> facultad . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idProgramaAcademico, nombre, facultad_idFacultad
				from programaacademico
				where nombre like '%" . $search . "%'";
	}
}
?>
