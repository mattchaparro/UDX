<?php
class RangoDAO{
    
	private $idRango;
	private $nombre;
	private $descripcion;
	private $valorMinimo;
	private $valorMaximo;

	function __construct($pIdRango = "", $pNombre = "", $pDescripcion = "", $pValorMinimo = "", $pValorMaximo = ""){
		$this -> idRango = $pIdRango;
		$this -> nombre = $pNombre;
		$this -> descripcion = $pDescripcion;
		$this -> valorMinimo = $pValorMinimo;
		$this -> valorMaximo = $pValorMaximo;
	}

	function insert(){
		return "insert into rango(nombre, descripcion, valorMinimo, valorMaximo)
				values('" . $this -> nombre . "', '" . $this -> descripcion . "', '" . $this -> valorMinimo . "', '" . $this -> valorMaximo . "')";
	}

	function update(){
		return "update rango set 
				nombre = '" . $this -> nombre . "',
				descripcion = '" . $this -> descripcion . "',
				valorMinimo = '" . $this -> valorMinimo . "',
				valorMaximo = '" . $this -> valorMaximo . "'	
				where idRango = '" . $this -> idRango . "'";
	}

	function select() {
		return "select idRango, nombre, descripcion, valorMinimo, valorMaximo
				from rango
				where idRango = '" . $this -> idRango . "'";
	}

	function selectAll() {
		return "select idRango, nombre, descripcion, valorMinimo, valorMaximo
				from rango";
	}

	function selectAllOrder($orden, $dir){
		return "select idRango, nombre, descripcion, valorMinimo, valorMaximo
				from rango
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idRango, nombre, descripcion, valorMinimo, valorMaximo
				from rango
				where nombre like '%" . $search . "%' or descripcion like '%" . $search . "%' or valorMinimo like '%" . $search . "%' or valorMaximo like '%" . $search . "%'";
	}
}
?>
