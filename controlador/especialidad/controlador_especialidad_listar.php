<?php
    require '../../modelo/modelo_especialidad.php';
    $ME = new Modelo_Especialidad();//instanciamos
    $consulta = $ME->listar_especialidad();
    if($consulta){
      // si trae datos 
        echo json_encode($consulta);
    }else{
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }
?>
