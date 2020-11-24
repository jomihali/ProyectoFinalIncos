<?php
    require '../../modelo/modelo_cita.php';
    $MC = new Modelo_Cita();//instanciamos
    $consulta = $MC->listar_cita();
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
