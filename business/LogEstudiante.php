<?php
require_once ("persistence/LogEstudianteDAO.php");
require_once ("persistence/Connection.php");

class LogEstudiante {
    
	private $idLogEstudiante;
	private $action;
	private $information;
	private $date;
	private $time;
	private $ip;
	private $os;
	private $browser;
	private $estudiante;
	private $logEstudianteDAO;
	private $connection;

	function getIdLogEstudiante() {
		return $this -> idLogEstudiante;
	}

	function setIdLogEstudiante($pIdLogEstudiante) {
		$this -> idLogEstudiante = $pIdLogEstudiante;
	}

	function getAction() {
		return $this -> action;
	}

	function setAction($pAction) {
		$this -> action = $pAction;
	}

	function getInformation() {
		return $this -> information;
	}

	function setInformation($pInformation) {
		$this -> information = $pInformation;
	}

	function getDate() {
		return $this -> date;
	}

	function setDate($pDate) {
		$this -> date = $pDate;
	}

	function getTime() {
		return $this -> time;
	}

	function setTime($pTime) {
		$this -> time = $pTime;
	}

	function getIp() {
		return $this -> ip;
	}

	function setIp($pIp) {
		$this -> ip = $pIp;
	}

	function getOs() {
		return $this -> os;
	}

	function setOs($pOs) {
		$this -> os = $pOs;
	}

	function getBrowser() {
		return $this -> browser;
	}

	function setBrowser($pBrowser) {
		$this -> browser = $pBrowser;
	}

	function getEstudiante() {
		return $this -> estudiante;
	}

	function setEstudiante($pEstudiante) {
		$this -> estudiante = $pEstudiante;
	}

	function __construct($pIdLogEstudiante = "", $pAction = "", $pInformation = "", $pDate = "", $pTime = "", $pIp = "", $pOs = "", $pBrowser = "", $pEstudiante = ""){
		$this -> idLogEstudiante = $pIdLogEstudiante;
		$this -> action = $pAction;
		$this -> information = $pInformation;
		$this -> date = $pDate;
		$this -> time = $pTime;
		$this -> ip = $pIp;
		$this -> os = $pOs;
		$this -> browser = $pBrowser;
		$this -> estudiante = $pEstudiante;
		$this -> logEstudianteDAO = new LogEstudianteDAO($this -> idLogEstudiante, $this -> action, $this -> information, $this -> date, $this -> time, $this -> ip, $this -> os, $this -> browser, $this -> estudiante);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logEstudianteDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logEstudianteDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logEstudianteDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idLogEstudiante = $result[0];
		$this -> action = $result[1];
		$this -> information = $result[2];
		$this -> date = $result[3];
		$this -> time = $result[4];
		$this -> ip = $result[5];
		$this -> os = $result[6];
		$this -> browser = $result[7];
		$estudiante = new Estudiante($result[8]);
		$estudiante -> select();
		$this -> estudiante = $estudiante;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logEstudianteDAO -> selectAll());
		$logEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			array_push($logEstudiantes, new LogEstudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante));
		}
		$this -> connection -> close();
		return $logEstudiantes;
	}

	function selectAllByEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logEstudianteDAO -> selectAllByEstudiante());
		$logEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			array_push($logEstudiantes, new LogEstudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante));
		}
		$this -> connection -> close();
		return $logEstudiantes;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logEstudianteDAO -> selectAllOrder($order, $dir));
		$logEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			array_push($logEstudiantes, new LogEstudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante));
		}
		$this -> connection -> close();
		return $logEstudiantes;
	}

	function selectAllByEstudianteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logEstudianteDAO -> selectAllByEstudianteOrder($order, $dir));
		$logEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			array_push($logEstudiantes, new LogEstudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante));
		}
		$this -> connection -> close();
		return $logEstudiantes;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> logEstudianteDAO -> search($search));
		$logEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[8]);
			$estudiante -> select();
			array_push($logEstudiantes, new LogEstudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $estudiante));
		}
		$this -> connection -> close();
		return $logEstudiantes;
	}
}
?>
