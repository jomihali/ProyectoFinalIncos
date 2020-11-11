<?php
    class Modelo_Cliente{

        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        function listar_cliente(){
            $sql = "call SP_LISTAR_CLIENTE()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function Registrar_CLiente($nombres,$apepat,$apemat,$direccion,$movil,$modelo,$nrodoc){
            $sql = "call SP_REGISTRAR_CLIENTE('$nombres','$apepat','$apemat','$direccion','$movil','$modelo','$nrodoc')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
      
        function Modificar_Cliente($id,$nombres,$apepat,$apemat,$direccion,$movil,$modelo,$ndoactual,$ndocnuevo,$estatus){
            $sql = "call SP_MODIFICAR_CLIENTE('$id','$nombres','$apepat','$direccion','$movil','$modelo','$ndoactual','$ndocnuevo','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }

    }
?>
