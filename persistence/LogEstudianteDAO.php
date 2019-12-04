<?php
class LogEstudianteDAO{
    
	private $idLogEstudiante;
	private $action;
	private $information;
	private $date;
	private $time;
	private $ip;
	private $os;
	private $browser;
	private $estudiante;

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
	}

	function insert(){
		return "insert into logestudiante(action, information, date, time, ip, os, browser, estudiante_idEstudiante)
				values('" . $this -> action . "', '" . $this -> information . "', '" . $this -> date . "', '" . $this -> time . "', '" . $this -> ip . "', '" . $this -> os . "', '" . $this -> browser . "', '" . $this -> estudiante . "')";
	}

	function update(){
		return "update logestudiante set 
				action = '" . $this -> action . "',
				information = '" . $this -> information . "',
				date = '" . $this -> date . "',
				time = '" . $this -> time . "',
				ip = '" . $this -> ip . "',
				os = '" . $this -> os . "',
				browser = '" . $this -> browser . "',
				estudiante_idEstudiante = '" . $this -> estudiante . "'	
				where idLogEstudiante = '" . $this -> idLogEstudiante . "'";
	}

	function select() {
		return "select idLogEstudiante, action, information, date, time, ip, os, browser, estudiante_idEstudiante
				from logestudiante
				where idLogEstudiante = '" . $this -> idLogEstudiante . "'";
	}

	function selectAll() {
		return "select idLogEstudiante, action, information, date, time, ip, os, browser, estudiante_idEstudiante
				from logestudiante";
	}

	function selectAllByEstudiante() {
		return "select idLogEstudiante, action, information, date, time, ip, os, browser, estudiante_idEstudiante
				from logestudiante
				where estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idLogEstudiante, action, information, date, time, ip, os, browser, estudiante_idEstudiante
				from logestudiante
				order by " . $orden . " " . $dir;
	}

	function selectAllByEstudianteOrder($orden, $dir) {
		return "select idLogEstudiante, action, information, date, time, ip, os, browser, estudiante_idEstudiante
				from logestudiante
				where estudiante_idEstudiante = '" . $this -> estudiante . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idLogEstudiante, action, information, date, time, ip, os, browser, estudiante_idEstudiante
				from logestudiante
				where action like '%" . $search . "%' or date like '%" . $search . "%' or time like '%" . $search . "%' or ip like '%" . $search . "%' or os like '%" . $search . "%' or browser like '%" . $search . "%'
				order by date desc, time desc";
	}
}
?>
