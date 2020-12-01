<?php
    require '../../modelo/modelo_consulta.php';
    $MC = new Modelo_Consulta();//instanciamos
    $consulta = $MC->listar_cliente_combo();
        echo json_encode($consulta);
?>
 