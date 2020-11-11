<?php
    require '../../modelo/modelo_cliente.php';
    $MP = new Modelo_Cliente();//instanciamos
    $consulta = $MP->listar_cliente();
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
