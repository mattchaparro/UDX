<?php
require_once ("persistence/ReportePublicacionDAO.php");
require_once ("persistence/Connection.php");

class ReportePublicacion {
    
	private $idReportePublicacion;
	private $fechaReporte;
	private $estudiante;
	private $publicacion;
	private $causal;
	private $reportePublicacionDAO;
	private $connection;

	function getIdReportePublicacion() {
		return $this -> idReportePublicacion;
	}

	function setIdReportePublicacion($pIdReportePublicacion) {
		$this -> idReportePublicacion = $pIdReportePublicacion;
	}

	function getFechaReporte() {
		return $this -> fechaReporte;
	}

	function setFechaReporte($pFechaReporte) {
		$this -> fechaReporte = $pFechaReporte;
	}

	function getEstudiante() {
		return $this -> estudiante;
	}

	function setEstudiante($pEstudiante) {
		$this -> estudiante = $pEstudiante;
	}

	function getPublicacion() {
		return $this -> publicacion;
	}

	function setPublicacion($pPublicacion) {
		$this -> publicacion = $pPublicacion;
	}

	function getCausal() {
		return $this -> causal;
	}

	function setCausal($pCausal) {
		$this -> causal = $pCausal;
	}

	function __construct($pIdReportePublicacion = "", $pFechaReporte = "", $pEstudiante = "", $pPublicacion = "", $pCausal = ""){
		$this -> idReportePublicacion = $pIdReportePublicacion;
		$this -> fechaReporte = $pFechaReporte;
		$this -> estudiante = $pEstudiante;
		$this -> publicacion = $pPublicacion;
		$this -> causal = $pCausal;
		$this -> reportePublicacionDAO = new ReportePublicacionDAO($this -> idReportePublicacion, $this -> fechaReporte, $this -> estudiante, $this -> publicacion, $this -> causal);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> insert());
		$this -> connection -> close();
	}

    function  existeReporte(){
		$this-> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO  -> existeReporte());
        if($this -> connection -> numRows() == 1){
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
    }
    
	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idReportePublicacion = $result[0];
		$this -> fechaReporte = $result[1];
		$estudiante = new Estudiante($result[2]);
		$estudiante -> select();
		$this -> estudiante = $estudiante;
		$publicacion = new Publicacion($result[3]);
		$publicacion -> select();
		$this -> publicacion = $publicacion;
		$causal = new Causal($result[4]);
		$causal -> select();
		$this -> causal = $causal;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> selectAll());
		$reportePublicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$publicacion = new Publicacion($result[3]);
			$publicacion -> select();
			$causal = new Causal($result[4]);
			$causal -> select();
			array_push($reportePublicacions, new ReportePublicacion($result[0], $result[1], $estudiante, $publicacion, $causal));
		}
		$this -> connection -> close();
		return $reportePublicacions;
	}

	function selectAllByEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> selectAllByEstudiante());
		$reportePublicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$publicacion = new Publicacion($result[3]);
			$publicacion -> select();
			$causal = new Causal($result[4]);
			$causal -> select();
			array_push($reportePublicacions, new ReportePublicacion($result[0], $result[1], $estudiante, $publicacion, $causal));
		}
		$this -> connection -> close();
		return $reportePublicacions;
	}

	function selectAllByPublicacion(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> selectAllByPublicacion());
		$reportePublicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$publicacion = new Publicacion($result[3]);
			$publicacion -> select();
			$causal = new Causal($result[4]);
			$causal -> select();
			array_push($reportePublicacions, new ReportePublicacion($result[0], $result[1], $estudiante, $publicacion, $causal));
		}
		$this -> connection -> close();
		return $reportePublicacions;
	}

	function selectAllByCausal(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> selectAllByCausal());
		$reportePublicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$publicacion = new Publicacion($result[3]);
			$publicacion -> select();
			$causal = new Causal($result[4]);
			$causal -> select();
			array_push($reportePublicacions, new ReportePublicacion($result[0], $result[1], $estudiante, $publicacion, $causal));
		}
		$this -> connection -> close();
		return $reportePublicacions;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> selectAllOrder($order, $dir));
		$reportePublicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$publicacion = new Publicacion($result[3]);
			$publicacion -> select();
			$causal = new Causal($result[4]);
			$causal -> select();
			array_push($reportePublicacions, new ReportePublicacion($result[0], $result[1], $estudiante, $publicacion, $causal));
		}
		$this -> connection -> close();
		return $reportePublicacions;
	}

	function selectAllByEstudianteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> selectAllByEstudianteOrder($order, $dir));
		$reportePublicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$publicacion = new Publicacion($result[3]);
			$publicacion -> select();
			$causal = new Causal($result[4]);
			$causal -> select();
			array_push($reportePublicacions, new ReportePublicacion($result[0], $result[1], $estudiante, $publicacion, $causal));
		}
		$this -> connection -> close();
		return $reportePublicacions;
	}

	function selectAllByPublicacionOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> selectAllByPublicacionOrder($order, $dir));
		$reportePublicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$publicacion = new Publicacion($result[3]);
			$publicacion -> select();
			$causal = new Causal($result[4]);
			$causal -> select();
			array_push($reportePublicacions, new ReportePublicacion($result[0], $result[1], $estudiante, $publicacion, $causal));
		}
		$this -> connection -> close();
		return $reportePublicacions;
	}

	function selectAllByCausalOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> selectAllByCausalOrder($order, $dir));
		$reportePublicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$publicacion = new Publicacion($result[3]);
			$publicacion -> select();
			$causal = new Causal($result[4]);
			$causal -> select();
			array_push($reportePublicacions, new ReportePublicacion($result[0], $result[1], $estudiante, $publicacion, $causal));
		}
		$this -> connection -> close();
		return $reportePublicacions;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> reportePublicacionDAO -> search($search));
		$reportePublicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$publicacion = new Publicacion($result[3]);
			$publicacion -> select();
			$causal = new Causal($result[4]);
			$causal -> select();
			array_push($reportePublicacions, new ReportePublicacion($result[0], $result[1], $estudiante, $publicacion, $causal));
		}
		$this -> connection -> close();
		return $reportePublicacions;
	}
}
?>
