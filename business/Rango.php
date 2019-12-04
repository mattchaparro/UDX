<?php
require_once ("persistence/RangoDAO.php");
require_once ("persistence/Connection.php");

class Rango {
    
	private $idRango;
	private $nombre;
	private $descripcion;
	private $valorMinimo;
	private $valorMaximo;
	private $rangoDAO;
	private $connection;

	function getIdRango() {
		return $this -> idRango;
	}

	function setIdRango($pIdRango) {
		$this -> idRango = $pIdRango;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function getValorMinimo() {
		return $this -> valorMinimo;
	}

	function setValorMinimo($pValorMinimo) {
		$this -> valorMinimo = $pValorMinimo;
	}

	function getValorMaximo() {
		return $this -> valorMaximo;
	}

	function setValorMaximo($pValorMaximo) {
		$this -> valorMaximo = $pValorMaximo;
	}

	function __construct($pIdRango = "", $pNombre = "", $pDescripcion = "", $pValorMinimo = "", $pValorMaximo = ""){
		$this -> idRango = $pIdRango;
		$this -> nombre = $pNombre;
		$this -> descripcion = $pDescripcion;
		$this -> valorMinimo = $pValorMinimo;
		$this -> valorMaximo = $pValorMaximo;
		$this -> rangoDAO = new RangoDAO($this -> idRango, $this -> nombre, $this -> descripcion, $this -> valorMinimo, $this -> valorMaximo);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> rangoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> rangoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> rangoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idRango = $result[0];
		$this -> nombre = $result[1];
		$this -> descripcion = $result[2];
		$this -> valorMinimo = $result[3];
		$this -> valorMaximo = $result[4];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> rangoDAO -> selectAll());
		$rangos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($rangos, new Rango($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $rangos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> rangoDAO -> selectAllOrder($order, $dir));
		$rangos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($rangos, new Rango($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $rangos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> rangoDAO -> search($search));
		$rangos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($rangos, new Rango($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $rangos;
	}
}
?>
