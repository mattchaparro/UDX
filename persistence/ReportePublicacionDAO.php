<?php
class ReportePublicacionDAO{
    
	private $idReportePublicacion;
	private $fechaReporte;
	private $estudiante;
	private $publicacion;
	private $causal;

	function __construct($pIdReportePublicacion = "", $pFechaReporte = "", $pEstudiante = "", $pPublicacion = "", $pCausal = ""){
		$this -> idReportePublicacion = $pIdReportePublicacion;
		$this -> fechaReporte = $pFechaReporte;
		$this -> estudiante = $pEstudiante;
		$this -> publicacion = $pPublicacion;
		$this -> causal = $pCausal;
	}

	function insert(){
		return "insert into reportepublicacion(fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal)
				values('" . $this -> fechaReporte . "', '" . $this -> estudiante . "', '" . $this -> publicacion . "', '" . $this -> causal . "')";
	}

    function existeReporte(){
        return "select *
                from reportepublicacion
                where estudiante_idEstudiante = '" . $this -> estudiante . "' and publicacion_idPublicacion='" . $this -> publicacion . "' and causal_idCausal='" . $this -> causal . "'";
    }
    
	function update(){
		return "update reportepublicacion set 
				fechaReporte = '" . $this -> fechaReporte . "',
				estudiante_idEstudiante = '" . $this -> estudiante . "',
				publicacion_idPublicacion = '" . $this -> publicacion . "',
				causal_idCausal = '" . $this -> causal . "'	
				where idReportePublicacion = '" . $this -> idReportePublicacion . "'";
	}

	function select() {
		return "select idReportePublicacion, fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal
				from reportepublicacion
				where idReportePublicacion = '" . $this -> idReportePublicacion . "'";
	}

	function selectAll() {
		return "select idReportePublicacion, fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal
				from reportepublicacion";
	}

	function selectAllByEstudiante() {
		return "select idReportePublicacion, fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal
				from reportepublicacion
				where estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}

	function selectAllByPublicacion() {
		return "select idReportePublicacion, fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal
				from reportepublicacion
				where publicacion_idPublicacion = '" . $this -> publicacion . "'";
	}

	function selectAllByCausal() {
		return "select idReportePublicacion, fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal
				from reportepublicacion
				where causal_idCausal = '" . $this -> causal . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idReportePublicacion, fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal
				from reportepublicacion
				order by " . $orden . " " . $dir;
	}

	function selectAllByEstudianteOrder($orden, $dir) {
		return "select idReportePublicacion, fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal
				from reportepublicacion
				where estudiante_idEstudiante = '" . $this -> estudiante . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByPublicacionOrder($orden, $dir) {
		return "select idReportePublicacion, fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal
				from reportepublicacion
				where publicacion_idPublicacion = '" . $this -> publicacion . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByCausalOrder($orden, $dir) {
		return "select idReportePublicacion, fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal
				from reportepublicacion
				where causal_idCausal = '" . $this -> causal . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idReportePublicacion, fechaReporte, estudiante_idEstudiante, publicacion_idPublicacion, causal_idCausal
				from reportepublicacion
				where fechaReporte like '%" . $search . "%'";
	}
}
?>
