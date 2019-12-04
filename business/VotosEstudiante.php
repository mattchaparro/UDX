<?php
require_once ("persistence/VotosEstudianteDAO.php");
require_once ("persistence/Connection.php");


class VotosEstudiante{

    private $idPublicacion;
    private $idEstudiante;
    private $voto;
    private $votosEstudianteDAO;
    private $connection;
    

    function __construct($idPublicacion="", $idEstudiante="", $voto=""){
        
        $this -> idPublicacion = $idPublicacion;
        $this -> idEstudiante = $idEstudiante;
        $this -> voto = $voto;
        $this -> votosEstudianteDAO = new VotosEstudianteDAO($this -> idPublicacion, $this -> idEstudiante, $this -> voto);
        $this -> connection = new Connection();
    }
    
    function getIdPublicacion(){
        return $this -> idPublicacion;
    }

    function getIdEstudiante(){
        return $this -> idEstudiante;
    }
    
    function getVoto() {
		return $this -> voto;
	}

    function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> votosEstudianteDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idPublicacion = $result[0];
        $this -> idEstudiante = $result[1];
        $this -> voto = $result[2];
	}
    
    function insert(){
        $this -> connection -> open();
		$this -> connection -> run($this -> votosEstudianteDAO -> insert());
		$this -> connection -> close();
    }
    
    function delete(){
        $this -> connection -> open();
		$this -> connection -> run($this -> votosEstudianteDAO -> delete());
		$this -> connection -> close();
    }

    function existeVoto(){
        $this-> connection -> open();
		$this -> connection -> run($this -> votosEstudianteDAO -> existeVoto());
        if($this -> connection -> numRows() == 1){
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
        }
    } 

}
?>