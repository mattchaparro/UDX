<?php
require_once ("persistence/EtiquetaDAO.php");
require_once ("persistence/Connection.php");

class Etiqueta {
    
	private $idEtiqueta;
	private $nombre;
	private $etiquetaDAO;
	private $connection;

	function getIdEtiqueta() {
		return $this -> idEtiqueta;
	}

	function setIdEtiqueta($pIdEtiqueta) {
		$this -> idEtiqueta = $pIdEtiqueta;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function __construct($pIdEtiqueta = "", $pNombre = ""){
		$this -> idEtiqueta = $pIdEtiqueta;
		$this -> nombre = $pNombre;
		$this -> etiquetaDAO = new EtiquetaDAO($this -> idEtiqueta, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> etiquetaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> etiquetaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> etiquetaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idEtiqueta = $result[0];
		$this -> nombre = $result[1];
	}
    
    function existeEtiqueta(){
		$this-> connection -> open();
		$this -> connection -> run($this -> etiquetaDAO -> existeEtiqueta());
        if($this -> connection -> numRows() == 1){
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
    }

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> etiquetaDAO -> selectAll());
		$etiquetas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($etiquetas, new Etiqueta($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $etiquetas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> etiquetaDAO -> selectAllOrder($order, $dir));
		$etiquetas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($etiquetas, new Etiqueta($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $etiquetas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> etiquetaDAO -> search($search));
		$etiquetas = array();
		while ($result = $this -> connection -> fetchRow()){
				array_push($etiquetas, new Etiqueta($result[0], $result[1]));
			}
			$this -> connection -> close();
			return $etiquetas;
		}
}
?>
