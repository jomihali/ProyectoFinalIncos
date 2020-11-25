<?php
    class Modelo_Cita{

        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }
        function listar_cita(){
            $sql = "call SP_LISTAR_CITA()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function listar_cliente_combo(){
            $sql = "call SP_LISTAR_CLIENTE_COMBO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function listar_tecnico_combo($id){
            $sql = "call SP_LISTAR_TECNICO_COMBO('$id')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function listar_especialidad_combo(){
            $sql = "call SP_LISTAR_ESPECIALIDAD_COMBO()"; 
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function Registrar_Cita($idcliente,$idtecnico,$descripcion,$especialidad,$idusuario){
			//
			$sql = "call SP_REGISTRAR_CITA('$idcliente','$idtecnico','$descripcion','$especialidad','$idusuario')";
			//
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
      
        function Editar_Cita($idcita,$idcliente,$idtecnico,$descripcion,$idespecialidad,$estatus){
            $sql = "call SP_MODIFICAR_CITA('$idcita','$idcliente','$idtecnico','$descripcion','$idespecialidad','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
              return 1;
			}else{
				return 0;
			}
			$this->conexion->cerrar();
        }

    }
?>
