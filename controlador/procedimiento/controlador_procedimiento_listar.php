<?php
//
    require '../../modelo/modelo_procedimiento.php';
    $MU = new Modelo_Procedimiento();//instanciamos
    $consulta = $MU->listar_procedimiento();
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
