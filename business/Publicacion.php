<?php
require_once ("persistence/PublicacionDAO.php");
require_once ("persistence/Connection.php");

class Publicacion {

	private $idPublicacion;
	private $titulo;
	private $descripcion;
	private $anexo;
	private $fecha;
	private $votoPositivo;
	private $votoNegativo;
	private $idRespuesta;
	private $estudiante;
	private $asignatura;
	private $publicacionDAO;
	private $connection;

	function getIdPublicacion() {
		return $this -> idPublicacion;
	}

	function setIdPublicacion($pIdPublicacion) {
		$this -> idPublicacion = $pIdPublicacion;
	}

	function getTitulo() {
		return $this -> titulo;
	}

	function setTitulo($pTitulo) {
		$this -> titulo = $pTitulo;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function getAnexo() {
		return $this -> anexo;
	}

	function setAnexo($pAnexo) {
		$this -> anexo = $pAnexo;
	}

	function getFecha() {
		return $this -> fecha;
	}

	function setFecha($pFecha) {
		$this -> fecha = $pFecha;
	}

	function getVotoPositivo() {
		return $this -> votoPositivo;
	}

	function setVotoPositivo($pVotoPositivo) {
		$this -> votoPositivo = $pVotoPositivo;
	}

	function getVotoNegativo() {
		return $this -> votoNegativo;
	}

	function setVotoNegativo($pVotoNegativo) {
		$this -> votoNegativo = $pVotoNegativo;
	}

	function getIdRespuesta() {
		return $this -> idRespuesta;
	}

	function setIdRespuesta($pIdRespuesta) {
		$this -> idRespuesta = $pIdRespuesta;
	}

	function getEstudiante() {
		return $this -> estudiante;
	}

	function setEstudiante($pEstudiante) {
		$this -> estudiante = $pEstudiante;
	}

	function getAsignatura() {
		return $this -> asignatura;
	}

	function setAsignatura($pAsignatura) {
		$this -> asignatura = $pAsignatura;
	}

	function __construct($pIdPublicacion = "", $pTitulo = "", $pDescripcion = "", $pAnexo = "", $pFecha = "", $pVotoPositivo = "", $pVotoNegativo = "", $pIdRespuesta = "", $pEstudiante = "", $pAsignatura = ""){
		$this -> idPublicacion = $pIdPublicacion;
		$this -> titulo = $pTitulo;
		$this -> descripcion = $pDescripcion;
		$this -> anexo = $pAnexo;
		$this -> fecha = $pFecha;
		$this -> votoPositivo = $pVotoPositivo;
		$this -> votoNegativo = $pVotoNegativo;
		$this -> idRespuesta = $pIdRespuesta;
		$this -> estudiante = $pEstudiante;
		$this -> asignatura = $pAsignatura;
		$this -> publicacionDAO = new PublicacionDAO($this -> idPublicacion, $this -> titulo, $this -> descripcion, $this -> anexo, $this -> fecha, $this -> votoPositivo, $this -> votoNegativo, $this -> idRespuesta, $this -> estudiante, $this -> asignatura);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> update());
		$this -> connection -> close();
	}

	function insertarVotoPos($voto){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> insertarVotoPos($voto));
		$this -> connection -> close();
	}
    
	function insertarVotoNeg($voto){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> insertarVotoNeg($voto));
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idPublicacion = $result[0];
		$this -> titulo = $result[1];
		$this -> descripcion = $result[2];
		$this -> anexo = $result[3];
		$this -> fecha = $result[4];
		$this -> votoPositivo = $result[5];
		$this -> votoNegativo = $result[6];
		$this -> idRespuesta = $result[7];
		$estudiante = new Estudiante($result[8]);
		$estudiante -> select();
		$this -> estudiante = $estudiante;
		$asignatura = new Asignatura($result[9]);
		$asignatura -> select();
		$this -> asignatura = $asignatura;
	}

    function lastPublication(){
        $this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> lastPublication());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$lastp = $this -> idPublicacion = $result[0];
        return $lastp;
    }
    
	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAll());
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllByEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllByEstudiante());
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllByAsignatura(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllByAsignatura());
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllByEtiqueta($etiqueta){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllByEtiqueta($etiqueta));
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllRespuesta(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllRespuesta());
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllPregunta(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllPregunta());
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllMasVotos(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllMasVotos());
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllConRespuesta(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllConRespuesta());
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllSinRespuesta(){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllSinRespuesta());
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}


	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllOrder($order, $dir));
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllOrderPregunta($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllOrderPregunta($order, $dir));
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllByEstudianteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllByEstudianteOrder($order, $dir));
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function selectAllByAsignaturaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> selectAllByAsignaturaOrder($order, $dir));
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> publicacionDAO -> search($search));
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}

	function searchByTitulo($search){
		$this -> connection -> open();
		//echo $this -> publicacionDAO -> searchByTitulo($search);
		$this -> connection -> run($this -> publicacionDAO -> searchByTitulo($search));
		$publicacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[9]);
			$asignatura -> select();
			array_push($publicacions, new Publicacion($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $publicacions;
	}
}
?>
