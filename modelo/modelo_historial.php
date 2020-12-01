<?php
    class Modelo_Historial{
 
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
		}

		function listar_detalle_procedimiento($id){
            $sql = "call SP_LISTAR_PROCEDIMIENTO_DETALLE('$id')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

		function listar_detalle_servicio($id){
            $sql = "call SP_LISTAR_SERVICIO_DETALLE('$id')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function listar_historial($fechainicio,$fechafin){
            $sql = "call SP_LISTAR_HISTORIAL('$fechainicio','$fechafin')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function listar_historial_consulta(){
            $sql = "call SP_LISTAR_CONSULTA_HISTORIAL()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }  
        
        function listar_procedimiento_combo(){
            $sql = "call SP_LISTAR_PROCEDIMIENTO_COMBO()"; 
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function listar_servicio_combo(){
            $sql = "call SP_LISTAR_SERVICIO_COMBO()"; 
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}
		
		function Registrar_Fua($idhistorial,$idconsulta){
            $sql = "call SP_REGISTRAR_FUA('$idhistorial','$idconsulta')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return 1;
				}else{
                        return 0;
				}
				
			}
			$this->conexion->cerrar();
		}
		
		function Registrar_Detalle_Procedimiento($id,$arreglo_procedimiento){
            $sql = "call SP_REGISTRAR_DETALLE_PROCEDIMIENTO('$id','$arreglo_procedimiento')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				$this->conexion->cerrar();
			}
			$this->conexion->cerrar();
        }
		
		
	function Registrar_Detalle_Servicio($id,$arreglo_servicio){
		$sql = "call SP_REGISTRAR_DETALLE_SERVICIO('$id','$arreglo_servicio')";
		if ($consulta = $this->conexion->conexion->query($sql)) {
			$this->conexion->cerrar();
		}
		$this->conexion->cerrar();
	}
	}

      
?>