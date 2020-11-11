<?php
    require '../../modelo/modelo_cita.php';
    $MC = new Modelo_Cita();//instanciamos
    $consulta = $MC->listar_cliente_combo();
        echo json_encode($consulta);
?>
