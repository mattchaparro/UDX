<?php
class PublicacionEtiquetaDAO{
    
	private $idPublicacionEtiqueta;
	private $publicacion;
	private $etiqueta;

	function __construct($pIdPublicacionEtiqueta = "", $pPublicacion = "", $pEtiqueta = ""){
		$this -> idPublicacionEtiqueta = $pIdPublicacionEtiqueta;
		$this -> publicacion = $pPublicacion;
		$this -> etiqueta = $pEtiqueta;
	}

	function insert(){
		return "insert into publicacionetiqueta(publicacion_idPublicacion, etiqueta_idEtiqueta)
				values('" . $this -> publicacion . "', '" . $this -> etiqueta . "')";
	}

	function update(){
		return "update publicacionetiqueta set 
				publicacion_idPublicacion = '" . $this -> publicacion . "',
				etiqueta_idEtiqueta = '" . $this -> etiqueta . "'	
				where idPublicacionEtiqueta = '" . $this -> idPublicacionEtiqueta . "'";
	}

	function select() {
		return "select idPublicacionEtiqueta, publicacion_idPublicacion, etiqueta_idEtiqueta
				from publicacionetiqueta
				where idPublicacionEtiqueta = '" . $this -> idPublicacionEtiqueta . "'";
	}

	function selectAll() {
		return "select idPublicacionEtiqueta, publicacion_idPublicacion, etiqueta_idEtiqueta
				from publicacionetiqueta";
	}

	function selectAllByPublicacion() {
		return "select idPublicacionEtiqueta, publicacion_idPublicacion, etiqueta_idEtiqueta
				from publicacionetiqueta
				where publicacion_idPublicacion = '" . $this -> publicacion . "'";
	}

	function selectAllByEtiqueta() {
		return "select idPublicacionEtiqueta, publicacion_idPublicacion, etiqueta_idEtiqueta
				from publicacionetiqueta
				where etiqueta_idEtiqueta = '" . $this -> etiqueta . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idPublicacionEtiqueta, publicacion_idPublicacion, etiqueta_idEtiqueta
				from publicacionetiqueta
				order by " . $orden . " " . $dir;
	}

	function selectAllByPublicacionOrder($orden, $dir) {
		return "select idPublicacionEtiqueta, publicacion_idPublicacion, etiqueta_idEtiqueta
				from publicacionetiqueta
				where publicacion_idPublicacion = '" . $this -> publicacion . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByEtiquetaOrder($orden, $dir) {
		return "select idPublicacionEtiqueta, publicacion_idPublicacion, etiqueta_idEtiqueta
				from publicacionetiqueta
				where etiqueta_idEtiqueta = '" . $this -> etiqueta . "'
				order by " . $orden . " " . $dir;
	}
}
?>
