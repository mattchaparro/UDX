<?php
class EstudianteDAO{
    
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
	}

	function logIn($email, $password){
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango
				from estudiante
				where correo = '" . $email . "' and clave = '" . md5($password) . "'";
	}

	function insert(){
		return "insert into estudiante(codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango)
				values('" . $this -> codigo . "', '" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> fecha_registro . "', '" . $this -> fecha_actualizacion . "', '" . $this -> foto . "', '" . $this -> telefono . "', '" . $this -> puntaje . "', '" . $this -> token . "', '" . $this -> state . "', '" . $this -> programaAcademico . "', '" . $this -> rango . "')";
	}

	function update(){
		return "update estudiante set 
				codigo = '" . $this -> codigo . "',
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				correo = '" . $this -> correo . "',
				fecha_registro = '" . $this -> fecha_registro . "',
				fecha_actualizacion = '" . $this -> fecha_actualizacion . "',
				telefono = '" . $this -> telefono . "',
				puntaje = '" . $this -> puntaje . "',
				token = '" . $this -> token . "',
				state = '" . $this -> state . "',
				programaAcademico_idProgramaAcademico = '" . $this -> programaAcademico . "',
				rango_idRango = '" . $this -> rango . "'	
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}
    
    function updateFromEstudiante(){
		return "update estudiante set 
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				telefono = '" . $this -> telefono . "',
				fecha_actualizacion = '". $this -> fecha_actualizacion . "'	
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}

	function updatePassword($password){
		return "update estudiante set 
				clave = '" . md5($password) . "'
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}

	function existEmail($email){
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaacademico_idProgramaAcademico, rango_idRango
				from estudiante
				where correo = '" . $email . "'";
	}

	function existeCorreo(){
        return "select correo
                from estudiante
                where correo = '" . $this -> correo . "'";
    }
    
    function existeCodigo(){
        return "select codigo
                from estudiante
                where codigo = '" . $this -> codigo . "'";
    }

	function recoverPassword($email, $password){
		return "update estudiante set 
				clave = '" . md5($password) . "'
				where correo = '" . $email . "'";
	}

	function updateImage($attribute, $value){
		return "update estudiante set "
				. $attribute . " = '" . $value . "'
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}
    
    function cambiarFoto() {
        return "update estudiante
                set foto = '" . $this -> foto . "'
                where idEstudiante ='" . $this -> idEstudiante . "'";
    }

	function select() {
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango
				from estudiante
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}

	function selectAll() {
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango
				from estudiante";
	}

	function selectAllByProgramaAcademico() {
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango
				from estudiante
				where programaAcademico_idProgramaAcademico = '" . $this -> programaAcademico . "'";
	}

	function selectAllByRango() {
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango
				from estudiante
				where rango_idRango = '" . $this -> rango . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango
				from estudiante
				order by " . $orden . " " . $dir;
	}

	function selectAllByProgramaAcademicoOrder($orden, $dir) {
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango
				from estudiante
				where programaAcademico_idProgramaAcademico = '" . $this -> programaAcademico . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByRangoOrder($orden, $dir) {
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango
				from estudiante
				where rango_idRango = '" . $this -> rango . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango
				from estudiante
				where codigo like '%" . $search . "%' or nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or correo like '%" . $search . "%' or fecha_registro like '%" . $search . "%' or fecha_actualizacion like '%" . $search . "%' or foto like '%" . $search . "%' or telefono like '%" . $search . "%' or puntaje like '%" . $search . "%' or token like '%" . $search . "%'";
	}
	function selectByCodigo(){
		return "select idEstudiante, codigo, nombre, apellido, correo, clave, fecha_registro, fecha_actualizacion, foto, telefono, puntaje, token, state, programaAcademico_idProgramaAcademico, rango_idRango
				from estudiante
				where codigo = '" . $this -> codigo . "'";
	}

	function updateStatus(){
		return "update estudiante set 
				state = '1'
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}

	function deleteToken(){
		return "update estudiante set 
				token = ''
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}
}
?>
