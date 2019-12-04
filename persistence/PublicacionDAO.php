<?php
class PublicacionDAO{

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
	}

	function insert(){
		return "insert into publicacion(titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura)
				values('" . $this -> titulo . "', '" . $this -> descripcion . "', '" . $this -> anexo . "', '" . $this -> fecha . "', '" . $this -> votoPositivo . "', '" . $this -> votoNegativo . "', '"
        . $this -> idRespuesta . "', '" . $this -> estudiante . "', '" . $this -> asignatura . "')";
	}

	function insertarVotoPos($voto){
		return "update publicacion set
				votoPositivo = '" . $voto . "' 
				where idPublicacion = '" . $this -> idPublicacion . "'";
	}

	function insertarVotoNeg($voto){
		return "update publicacion set
				votoNegativo = '" . $voto . "' 
				where idPublicacion = '" . $this -> idPublicacion . "'";
	}

	function update(){
		return "update publicacion set
				titulo = '" . $this -> titulo . "',
				descripcion = '" . $this -> descripcion . "',
				anexo = '" . $this -> anexo . "',
				fecha = '" . $this -> fecha . "',
				votoPositivo = '" . $this -> votoPositivo . "',
				votoNegativo = '" . $this -> votoNegativo . "',
				idRespuesta = '" . $this -> idRespuesta . "',
				estudiante_idEstudiante = '" . $this -> estudiante . "',
				asignatura_idAsignatura = '" . $this -> asignatura . "'
				where idPublicacion = '" . $this -> idPublicacion . "'";
	}

	function select() {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where idPublicacion = '" . $this -> idPublicacion . "'";
	}
    
    function lastPublication() {
		return "select max(idPublicacion) from publicacion";
	}

	function selectAll() {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion";
	}

	function selectAllByEstudiante() {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}

	function selectAllByAsignatura() {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where asignatura_idAsignatura = '" . $this -> asignatura . "'";
	}

	function selectAllRespuesta() {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where idRespuesta = '" . $this -> idRespuesta . "'";
	}

	function selectAllPregunta() {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where idRespuesta = '0'";
	}

	function selectAllByEtiqueta($idEtiqueta) {
		return "select publicacion.* 
				from publicacion, publicacionetiqueta, etiqueta		
				where publicacion.idPublicacion = publicacionetiqueta.publicacion_idPublicacion 
				AND etiqueta.idEtiqueta = publicacionetiqueta.etiqueta_idEtiqueta
				AND publicacionetiqueta.etiqueta_idEtiqueta = '" . $idEtiqueta . "'";
	}

	function selectAllSinRespuesta() {
		return "select * 
				from preguntas 
				where preguntas.idPublicacion NOT IN (select respuestas.idRespuesta from respuestas)";
	}

	function selectAllConRespuesta() {
		return "select * 
				from publicacion 
				where  publicacion.idPublicacion IN (select respuestas.idRespuesta from respuestas)";
	}

	function selectAllMasVotos() {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where idRespuesta = '0'
				order by 'votos' 'desc'";
	}

	function selectAllOrder($orden, $dir){
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				order by " . $orden . " " . $dir;
	}

	function selectAllOrderPregunta($orden, $dir){
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where idRespuesta = '0'
				order by " . $orden . " " . $dir;
	}

	function selectAllByEstudianteOrder($orden, $dir) {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where estudiante_idEstudiante = '" . $this -> estudiante . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByAsignaturaOrder($orden, $dir) {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where asignatura_idAsignatura = '" . $this -> asignatura . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where titulo like '%" . $search . "%' or anexo like '%" . $search . "%' or fecha like '%" . $search . "%' or votoPositivo like '%" . $search . "%' or votoNegativo like '%" . $search . "%' or idRespuesta like '%" . $search . "%'";
	}

	function searchByTitulo($search) {
		return "select idPublicacion, titulo, descripcion, anexo, fecha, votoPositivo, votoNegativo, idRespuesta, estudiante_idEstudiante, asignatura_idAsignatura
				from publicacion
				where titulo like '%" . $search . "%' or titulo like '%" . $search . "'";
	}
}
?>
