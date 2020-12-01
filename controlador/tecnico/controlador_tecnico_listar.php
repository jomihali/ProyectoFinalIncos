<?php
    require '../../modelo/modelo_tecnico.php';
    $MM = new Modelo_Tecnico();//instanciamos
    $consulta = $MM->listar_tecnico();
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
   