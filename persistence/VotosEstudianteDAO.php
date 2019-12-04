<?php
class VotosEstudianteDAO{

    private $idPublicacion;
    private $idEstudiante;
    private $voto;
  
    function __construct($idPublicacion = "", $idEstudiante = "", $voto=""){
       $this -> idPublicacion = $idPublicacion;
       $this -> idEstudiante = $idEstudiante;
       $this -> voto = $voto;
    }

    function insert(){
        return "insert into votosestudiante
        values('" . $this -> idPublicacion . "', '" . $this -> idEstudiante . "', '" . $this -> voto . "')";
    }
    
    function delete(){
        return "delete from votosestudiante
        where publicacion_idPublicacion='" . $this -> idPublicacion . "' and estudiante_idEstudiante='" . $this -> idEstudiante . "'";
    }

    function select(){
        return "select * from votosestudiante
                where publicacion_idPublicacion = '". $this -> idPublicacion . "' 
                and estudiante_idEstudiante = '" . $this -> idEstudiante . "'";
    }
    
    function existeVoto(){
        return "select * from votosestudiante
                where publicacion_idPublicacion = '". $this -> idPublicacion . "' 
                and estudiante_idEstudiante = '" . $this -> idEstudiante . "'";
    }

}

?>