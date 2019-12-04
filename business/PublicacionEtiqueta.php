<?php
require_once ("persistence/PublicacionEtiquetaDAO.php");
require_once ("persistence/Connection.php");

class PublicacionEtiqueta {
    
	private $idPublicacionEtiqueta;
	private $publicacion;
	private $etiqueta;
	private $publicacionEtiquetaDAO;
	private $connection;

	function getIdPublicacionEtiqueta() {
		return $this -> idPublicacionEtiqueta;
	}

	function setIdPublicacionEtiqueta($pIdPublicacionEtiqueta) {
		$this -> idPublicacionEtiqueta = $pIdPublicacionEtiqueta;
	}

	function getPublicacion() {
		return $this -> publicacion;
	}

	function setPublicacion($pPublicacion) {
		$this -> publicacion = $pPublicacion;
	}

	function getEtiqueta() {
		return $this -> etiqueta;
	}

	function setEtiqueta($pEtiqueta) {
		$this -> etiqueta = $pEtiqueta;
	}

	function __construct($pIdPublicacionEtiqueta = "", $pPublicacion = "", $pEtiqueta = ""){
		$this -> idPublicacionEtiqueta = $pIdPublicacionEtiqueta;
		$this -> publicacion = $pPublicacion;
		$this -> etiqueta = $pEtiqueta;
		$this -> publicacionEtiquetaDAO = new PublicacionEtiquetaDAO($this -> idPublicacionEtiqueta, $this -> publicacion, $this -> etiqueta);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionEtiquetaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionEtiquetaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionEtiquetaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idPublicacionEtiqueta = $result[0];
		$publicacion = new Publicacion($result[1]);
		$publicacion -> select();
		$this -> publicacion = $publicacion;
		$etiqueta = new Etiqueta($result[2]);
		$etiqueta -> select();
		$this -> etiqueta = $etiqueta;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionEtiquetaDAO -> selectAll());
		$publicacionEtiquetas = array();
		while ($result = $this -> connection -> fetchRow()){
			$publicacion = new Publicacion($result[1]);
			$publicacion -> select();
			$etiqueta = new Etiqueta($result[2]);
			$etiqueta -> select();
			array_push($publicacionEtiquetas, new PublicacionEtiqueta($result[0], $publicacion, $etiqueta));
		}
		$this -> connection -> close();
		return $publicacionEtiquetas;
	}

	function selectAllByPublicacion(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionEtiquetaDAO -> selectAllByPublicacion());
		$publicacionEtiquetas = array();
		while ($result = $this -> connection -> fetchRow()){
			$publicacion = new Publicacion($result[1]);
			$publicacion -> select();
			$etiqueta = new Etiqueta($result[2]);
			$etiqueta -> select();
			array_push($publicacionEtiquetas, new PublicacionEtiqueta($result[0], $publicacion, $etiqueta));
		}
		$this -> connection -> close();
		return $publicacionEtiquetas;
	}

	function selectAllByEtiqueta(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionEtiquetaDAO -> selectAllByEtiqueta());
		$publicacionEtiquetas = array();
		while ($result = $this -> connection -> fetchRow()){
			$publicacion = new Publicacion($result[1]);
			$publicacion -> select();
			$etiqueta = new Etiqueta($result[2]);
			$etiqueta -> select();
			array_push($publicacionEtiquetas, new PublicacionEtiqueta($result[0], $publicacion, $etiqueta));
		}
		$this -> connection -> close();
		return $publicacionEtiquetas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionEtiquetaDAO -> selectAllOrder($order, $dir));
		$publicacionEtiquetas = array();
		while ($result = $this -> connection -> fetchRow()){
			$publicacion = new Publicacion($result[1]);
			$publicacion -> select();
			$etiqueta = new Etiqueta($result[2]);
			$etiqueta -> select();
			array_push($publicacionEtiquetas, new PublicacionEtiqueta($result[0], $publicacion, $etiqueta));
		}
		$this -> connection -> close();
		return $publicacionEtiquetas;
	}

	function selectAllByPublicacionOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionEtiquetaDAO -> selectAllByPublicacionOrder($order, $dir));
		$publicacionEtiquetas = array();
		while ($result = $this -> connection -> fetchRow()){
			$publicacion = new Publicacion($result[1]);
			$publicacion -> select();
			$etiqueta = new Etiqueta($result[2]);
			$etiqueta -> select();
			array_push($publicacionEtiquetas, new PublicacionEtiqueta($result[0], $publicacion, $etiqueta));
		}
		$this -> connection -> close();
		return $publicacionEtiquetas;
	}

	function selectAllByEtiquetaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionEtiquetaDAO -> selectAllByEtiquetaOrder($order, $dir));
		$publicacionEtiquetas = array();
		while ($result = $this -> connection -> fetchRow()){
			$publicacion = new Publicacion($result[1]);
			$publicacion -> select();
			$etiqueta = new Etiqueta($result[2]);
			$etiqueta -> select();
			array_push($publicacionEtiquetas, new PublicacionEtiqueta($result[0], $publicacion, $etiqueta));
		}
		$this -> connection -> close();
		return $publicacionEtiquetas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionEtiquetaDAO -> search($search));
		$publicacionEtiquetas = array();
		while ($result = $this -> connection -> fetchRow()){
			$publicacion = new Publicacion($result[1]);
			$publicacion -> select();
			$etiqueta = new Etiqueta($result[2]);
			$etiqueta -> select();
			array_push($publicacionEtiquetas, new PublicacionEtiqueta($result[0], $publicacion, $etiqueta));
		}
		$this -> connection -> close();
		return $publicacionEtiquetas;
	}
}
?>
