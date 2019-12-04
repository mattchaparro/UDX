<?php
class EtiquetaDAO{
    
	private $idEtiqueta;
	private $nombre;

    function __construct($pIdEtiqueta = "", $pNombre = ""){
		$this -> idEtiqueta = $pIdEtiqueta;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into etiqueta(nombre)
				values('" . $this -> nombre . "')";
	}

	function update(){
		return "update etiqueta set 
				nombre = '" . $this -> nombre . "'	
				where idEtiqueta = '" . $this -> idEtiqueta . "'";
	}

	function select() {
		return "select idEtiqueta, nombre
				from etiqueta
				where idEtiqueta = '" . $this -> idEtiqueta . "'";
	}
    
    function existeEtiqueta(){
        return "select nombre
                from etiqueta
                where nombre = '" . $this -> nombre . "'";
    }

	function selectAll() {
		return "select *
				from etiqueta";
	}

	function selectAllOrder($orden, $dir){
		return "select idEtiqueta, nombre
				from etiqueta
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select *
				from etiqueta
				where nombre like '" . $search . "%' limit 3";
	}
}
?>
