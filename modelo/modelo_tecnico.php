<?php
    class Modelo_Tecnico{

        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }
        function listar_tecnico(){
            $sql = "call SP_LISTAR_TECNICO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function listar_especialidad_combo(){
            $sql = "call SP_LISTAR_COMBO_ESPECIALIDAD()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function Registrar_Tecnico($nombres,$apepat,$apemat,$direccion,$movil,$sexo,$fenac,$nrodocumento,$especialidad,$usu,$contra,$rol,$email){
            $sql = "call SP_REGISTRAR_TECNICO('$nombres','$apepat','$apemat','$direccion','$movil','$sexo','$fenac','$nrodocumento','$especialidad','$usu','$contra','$rol','$email')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }

        function Modificar_Procedimiento($id,$procedimientoactual,$procedimientonuevo,$estatus){
            $sql = "call SP_MODIFICAR_PROCEDIMIENTO('$id','$procedimientoactual','$procedimientonuevo','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }

    }
?>
