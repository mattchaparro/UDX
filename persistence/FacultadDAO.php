<?php
class FacultadDAO{
    
	private $idFacultad;
	private $nombre;

	function __construct($pIdFacultad = "", $pNombre = ""){
		$this -> idFacultad = $pIdFacultad;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into facultad(nombre)
				values('" . $this -> nombre . "')";
	}

	function update(){
		return "update facultad set 
				nombre = '" . $this -> nombre . "'	
				where idFacultad = '" . $this -> idFacultad . "'";
	}

	function select() {
		return "select idFacultad, nombre
				from facultad
				where idFacultad = '" . $this -> idFacultad . "'";
	}

	function selectAll() {
		return "select idFacultad, nombre
				from facultad";
	}

	function selectAllOrder($orden, $dir){
		return "select idFacultad, nombre
				from facultad
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idFacultad, nombre
				from facultad
				where nombre like '%" . $search . "%'";
	}
}
?>
