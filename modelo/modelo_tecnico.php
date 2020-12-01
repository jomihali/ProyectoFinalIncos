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

        function Registrar_Tecnico($nombre,$apepat,$apemat,$direccion,$sexo,$fenac,$nrodocumento,$especialidad,$movil,$usu,$contra,$rol,$email){
            $sql = "call SP_REGISTRAR_TECNICO('$nombre','$apepat','$apemat','$direccion','$sexo','$fenac','$nrodocumento','$especialidad','$movil','$usu','$contra','$rol','$email')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }

        function Modificar_Tecnico($idtecnico,$nombre,$apepat,$apemat,$direccion,$sexo,$fenac,$nrodocumentoactual,$nrodocumentonuevo,$especialidad,$movil,$idusuario,$email){
            $sql = "call SP_MODIFICAR_TECNICO('$idtecnico','$nombre','$apepat','$apemat','$direccion','$sexo','$fenac','$nrodocumentoactual','$nrodocumentonuevo','$especialidad','$movil','$idusuario','$email')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }

    }
?>
