<?php
    require '../../modelo/modelo_servicio.php';
    $MM = new Modelo_Servicio();//instanciamos
    $consulta = $MM->listar_servicio();
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
   