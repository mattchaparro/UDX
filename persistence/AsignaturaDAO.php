<?php
class AsignaturaDAO{
	private $idAsignatura;
	private $nombre;

	function __construct($pIdAsignatura = "", $pNombre = ""){
		$this -> idAsignatura = $pIdAsignatura;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into asignatura(nombre)
				values('" . $this -> nombre . "')";
	}

	function update(){
		return "update asignatura set 
				nombre = '" . $this -> nombre . "'	
				where idAsignatura = '" . $this -> idAsignatura . "'";
	}

	function select() {
		return "select idAsignatura, nombre
				from asignatura
				where idAsignatura = '" . $this -> idAsignatura . "'";
	}

	function selectAll() {
		return "select idAsignatura, nombre
				from asignatura";
	}

	function selectAllOrder($orden, $dir){
		return "select idAsignatura, nombre
				from asignatura
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select *
				from asignatura
				where nombre like '" . $search . "%' limit 4";
	}
}
?>
