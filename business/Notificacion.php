<?php
require_once ("persistence/Connection.php");
require_once ("persistence/NotificacionDAO.php");

class Notificacion {

    private $idNotificacion;
    private $idEstudiante1;
    private $idEstudiante2;
    private $idPublicacion;
    private $tipo;
    private $leido;
    private $fecha;
    private $connection;
    private $notificacionDAO;

    function __construct($idNotificacion="",$idEstudiante1="", $idEstudiante2="", $idPublicacion="", $tipo="", $leido="",$fecha=""){
        $this -> idNotificacion = $idNotificacion;
        $this -> idEstudiante1 = $idEstudiante1;
        $this -> idEstudiante2 = $idEstudiante2;
        $this -> idPublicacion = $idPublicacion;
        $this -> tipo = $tipo;
        $this -> leido = $leido;
        $this -> fecha = $fecha;
        $this -> notificacionDAO = new NotificacionDAO($this -> idNotificacion, $this -> idEstudiante1,  $this -> idEstudiante2,  $this -> idPublicacion,  $this -> tipo , $this -> leido, $this -> fecha);
        $this -> connection = new Connection;
    }

  function getIdNotificacion() {
  return $this -> idNotificacion;
  }

  function getIdPublicacion() {
  return $this -> idPublicacion;
  }
  
  function getIdEstudiante1() {
  return $this -> idEstudiante1;
  }

  function getIdEstudiante2() {
    return $this -> idEstudiante2;
    }
  
  function getLeido() {
  return $this -> leido;
  }

  function getTipo() {
		return $this -> tipo;
  }
   function getFecha() {
		return $this -> fecha;
	}
 

    function selectAllByEstudiante(){
    $this -> connection -> open();
		$this -> connection -> run($this -> notificacionDAO -> selectAllByEstudiante());
		$notificaciones = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante1 = new Estudiante($result[1]);
			$estudiante1 -> select();
			$estudiante2 = new Estudiante($result[2]);
      $estudiante2 -> select();
      $tipo = new TipoNotificacion($result[4]);
      $tipo -> select();
			array_push($notificaciones, new Notificacion($result[0],$estudiante1, $estudiante2, $result[3], $tipo, $result[5], $result[6]));
		}
		$this -> connection -> close();
		return $notificaciones;
  }
  
  function insert(){
    $this -> connection -> open();
		$this -> connection -> run($this -> notificacionDAO -> insert());
		$this -> connection -> close();
	}


}
?>