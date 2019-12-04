<?php
require_once ("persistence/EstudianteDAO.php");
require_once ("persistence/Connection.php");

class Estudiante {
    
	private $idEstudiante;
	private $codigo;
	private $nombre;
	private $apellido;
	private $correo;
	private $clave;
	private $fecha_registro;
	private $fecha_actualizacion;
	private $foto;
	private $telefono;
	private $puntaje;
	private $token;
	private $state;
	private $programaAcademico;
	private $rango;
	private $estudianteDAO;
	private $connection;

    function __construct($pIdEstudiante = "", $pCodigo = "", $pNombre = "", $pApellido = "", $pCorreo = "", $pClave = "", $pFecha_registro = "", $pFecha_actualizacion = "", $pFoto = "", $pTelefono = "", $pPuntaje = "", $pToken = "", $pState = "", $pProgramaAcademico = "", $pRango = ""){
		$this -> idEstudiante = $pIdEstudiante;
		$this -> codigo = $pCodigo;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> fecha_registro = $pFecha_registro;
		$this -> fecha_actualizacion = $pFecha_actualizacion;
		$this -> foto = $pFoto;
		$this -> telefono = $pTelefono;
		$this -> puntaje = $pPuntaje;
		$this -> token = $pToken;
		$this -> state = $pState;
		$this -> programaAcademico = $pProgramaAcademico;
		$this -> rango = $pRango;
		$this -> estudianteDAO = new EstudianteDAO($this -> idEstudiante, $this -> codigo, $this -> nombre, $this -> apellido, $this -> correo, $this -> clave, $this -> fecha_registro, $this -> fecha_actualizacion, $this -> foto, $this -> telefono, $this -> puntaje, $this -> token, $this -> state, $this -> programaAcademico, $this -> rango);
		$this -> connection = new Connection();
	}
    
	function logIn($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> logIn($email, $password));
		if($this -> connection -> numRows()==1){
			$result = $this -> connection -> fetchRow();
			$this -> idEstudiante = $result[0];
			$this -> codigo = $result[1];
			$this -> nombre = $result[2];
			$this -> apellido = $result[3];
			$this -> correo = $result[4];
			$this -> clave = $result[5];
			$this -> fecha_registro = $result[6];
			$this -> fecha_actualizacion = $result[7];
			$this -> foto = $result[8];
			$this -> telefono = $result[9];
			$this -> puntaje = $result[10];
			$this -> token = $result[11];
			$this -> state = $result[12];
			$programaAcademico = new ProgramaAcademico($result[13]);
			$programaAcademico -> select();
			$this -> programaAcademico = $programaAcademico;
			$rango = new Rango($result[14]);
			$rango -> select();
			$this -> rango = $rango;
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> update());
		$this -> connection -> close();
	}

    function updateFromEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> updateFromEstudiante());
		$this -> connection -> close();
	}
    
	function updatePassword($password){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> updatePassword($password));
		$this -> connection -> close();
	}

	function existEmail($email){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> existEmail($email));
		if($this -> connection -> numRows() == 1){
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
	}

	function  existeCorreo(){
		$this-> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> existeCorreo());
        if($this -> connection -> numRows() == 1){
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
    }
    
    function existeCodigo(){
		$this-> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> existeCodigo());
        if($this -> connection -> numRows() == 1){
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
    }

	function recoverPassword($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> recoverPassword($email, $password));
		$this -> connection -> close();
	}

	function updateImage($attribute, $value){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> updateImage($attribute, $value));
		$this -> connection -> close();
	}
    
    function cambiarFoto() {
        $this -> connection -> open();
        $this -> connection -> run($this -> estudianteDAO -> cambiarFoto());
        $this -> connection -> close();
    }

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idEstudiante = $result[0];
		$this -> codigo = $result[1];
		$this -> nombre = $result[2];
		$this -> apellido = $result[3];
		$this -> correo = $result[4];
		$this -> clave = $result[5];
		$this -> fecha_registro = $result[6];
		$this -> fecha_actualizacion = $result[7];
		$this -> foto = $result[8];
		$this -> telefono = $result[9];
		$this -> puntaje = $result[10];
		$this -> token = $result[11];
		$this -> state = $result[12];
		$programaAcademico = new ProgramaAcademico($result[13]);
		$programaAcademico -> select();
		$this -> programaAcademico = $programaAcademico;
		$rango = new Rango($result[14]);
		$rango -> select();
		$this -> rango = $rango;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAll());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[13]);
			$programaAcademico -> select();
			$rango = new Rango($result[14]);
			$rango -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $programaAcademico, $rango));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByProgramaAcademico(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByProgramaAcademico());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[13]);
			$programaAcademico -> select();
			$rango = new Rango($result[14]);
			$rango -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $programaAcademico, $rango));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByRango(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByRango());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[13]);
			$programaAcademico -> select();
			$rango = new Rango($result[14]);
			$rango -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $programaAcademico, $rango));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[13]);
			$programaAcademico -> select();
			$rango = new Rango($result[14]);
			$rango -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $programaAcademico, $rango));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByProgramaAcademicoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByProgramaAcademicoOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[13]);
			$programaAcademico -> select();
			$rango = new Rango($result[14]);
			$rango -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $programaAcademico, $rango));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByRangoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByRangoOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[13]);
			$programaAcademico -> select();
			$rango = new Rango($result[14]);
			$rango -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $programaAcademico, $rango));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> search($search));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$programaAcademico = new ProgramaAcademico($result[13]);
			$programaAcademico -> select();
			$rango = new Rango($result[14]);
			$rango -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $programaAcademico, $rango));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectByCodigo(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectByCodigo());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idEstudiante = $result[0];
		$this -> codigo = $result[1];
		$this -> nombre = $result[2];
		$this -> apellido = $result[3];
		$this -> correo = $result[4];
		$this -> clave = $result[5];
		$this -> fecha_registro = $result[6];
		$this -> fecha_actualizacion = $result[7];
		$this -> foto = $result[8];
		$this -> telefono = $result[9];
		$this -> puntaje = $result[10];
		$this -> token = $result[11];
		$this -> state = $result[12];
		$programaAcademico = new ProgramaAcademico($result[13]);
		$programaAcademico -> select();
		$this -> programaAcademico = $programaAcademico;
		$rango = new Rango($result[14]);
		$rango -> select();
		$this -> rango = $rango;
	}
    
    	function getIdEstudiante() {
		return $this -> idEstudiante;
	}

	function setIdEstudiante($pIdEstudiante) {
		$this -> idEstudiante = $pIdEstudiante;
	}

	function getCodigo() {
		return $this -> codigo;
	}

	function setCodigo($pCodigo) {
		$this -> codigo = $pCodigo;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getApellido() {
		return $this -> apellido;
	}

	function setApellido($pApellido) {
		$this -> apellido = $pApellido;
	}

	function getCorreo() {
		return $this -> correo;
	}

	function setCorreo($pCorreo) {
		$this -> correo = $pCorreo;
	}

	function getClave() {
		return $this -> clave;
	}

	function setClave($pClave) {
		$this -> clave = $pClave;
	}

	function getFecha_registro() {
		return $this -> fecha_registro;
	}

	function setFecha_registro($pFecha_registro) {
		$this -> fecha_registro = $pFecha_registro;
	}

	function getFecha_actualizacion() {
		return $this -> fecha_actualizacion;
	}

	function setFecha_actualizacion($pFecha_actualizacion) {
		$this -> fecha_actualizacion = $pFecha_actualizacion;
	}

	function getFoto() {
		return $this -> foto;
	}

	function setFoto($pFoto) {
		$this -> foto = $pFoto;
	}

	function getTelefono() {
		return $this -> telefono;
	}

	function setTelefono($pTelefono) {
		$this -> telefono = $pTelefono;
	}

	function getPuntaje() {
		return $this -> puntaje;
	}

	function setPuntaje($pPuntaje) {
		$this -> puntaje = $pPuntaje;
	}

	function getToken() {
		return $this -> token;
	}

	function setToken($pToken) {
		$this -> token = $pToken;
	}

	function getState() {
		return $this -> state;
	}

	function setState($pState) {
		$this -> state = $pState;
	}

	function getProgramaAcademico() {
		return $this -> programaAcademico;
	}

	function setProgramaAcademico($pProgramaAcademico) {
		$this -> programaAcademico = $pProgramaAcademico;
	}

	function getRango() {
		return $this -> rango;
	}

	function setRango($pRango) {
		$this -> rango = $pRango;
	}

	function updateStatus(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> updateStatus());
		$this -> connection -> close();
	}

	function deleteToken(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> deleteToken());
		$this -> connection -> close();
	}
}
?>
