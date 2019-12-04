<?php
class NotificacionDAO {

    private $idNotificacion;
    private $idEstudiante1;
    private $idEstudiante2;
    private $idPublicacion;
    private $tipo;
    private $leido;
    private $fecha;

    function __construct($idNotificacion="",$idEstudiante1="", $idEstudiante2="", $idPublicacion="", $tipo="", $leido="",$fecha=""){
        $this -> idNotificacion = $idNotificacion;
        $this -> idEstudiante1 = $idEstudiante1;
        $this -> idEstudiante2 = $idEstudiante2;
        $this -> idPublicacion = $idPublicacion;
        $this -> tipo = $tipo;
        $this -> leido = $leido;
        $this -> fecha = $fecha;
    }

    function selectAllByEstudiante(){
        return "select * 
                from notificaciones
                where idEstudiante1 = '" .$this -> idEstudiante1 . "' 
                and leido = 0
                order by fecha desc
                limit 7";

    }

    function insert(){
        return "insert into notificaciones (idEstudiante1, idEstudiante2, idPublicacion, tipo, leido, fecha)
                values ('". $this -> idEstudiante1 . "', '" . $this -> idEstudiante2 . "', '" . $this -> idPublicacion . "',
                         '" . $this -> tipo . "', '". $this -> leido ."', '" . $this -> fecha . "')";
    }
}


?>