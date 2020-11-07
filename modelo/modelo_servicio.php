<?php
    class Modelo_Servicio{

        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }
        function listar_servicio(){
            $sql = "call SP_LISTAR_SERVICIO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function Registrar_Servicio($servicio,$estatus){
            $sql = "call SP_REGISTRAR_SERVICIO('$servicio','$estatus')";
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
