<?php
require_once ("persistence/CausalDAO.php");
require_once ("persistence/Connection.php");

class Causal {
    
	private $idCausal;
	private $descripcion;
	private $causalDAO;
	private $connection;

	function getIdCausal() {
		return $this -> idCausal;
	}

	function setIdCausal($pIdCausal) {
		$this -> idCausal = $pIdCausal;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function __construct($pIdCausal = "", $pDescripcion = ""){
		$this -> idCausal = $pIdCausal;
		$this -> descripcion = $pDescripcion;
		$this -> causalDAO = new CausalDAO($this -> idCausal, $this -> descripcion);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> causalDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> causalDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> causalDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCausal = $result[0];
		$this -> descripcion = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> causalDAO -> selectAll());
		$causals = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($causals, new Causal($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $causals;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> causalDAO -> selectAllOrder($order, $dir));
		$causals = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($causals, new Causal($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $causals;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> causalDAO -> search($search));
		$causals = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($causals, new Causal($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $causals;
	}
}
?>
