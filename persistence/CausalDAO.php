<?php
class CausalDAO{
    
	private $idCausal;
	private $descripcion;

	function __construct($pIdCausal = "", $pDescripcion = ""){
		$this -> idCausal = $pIdCausal;
		$this -> descripcion = $pDescripcion;
	}

	function insert(){
		return "insert into causal(descripcion)
				values('" . $this -> descripcion . "')";
	}

	function update(){
		return "update causal set 
				descripcion = '" . $this -> descripcion . "'	
				where idCausal = '" . $this -> idCausal . "'";
	}

	function select() {
		return "select idCausal, descripcion
				from causal
				where idCausal = '" . $this -> idCausal . "'";
	}

	function selectAll() {
		return "select idCausal, descripcion
				from causal";
	}

	function selectAllOrder($orden, $dir){
		return "select idCausal, descripcion
				from causal
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCausal, descripcion
				from causal
				where descripcion like '%" . $search . "%'";
	}
}
?>
