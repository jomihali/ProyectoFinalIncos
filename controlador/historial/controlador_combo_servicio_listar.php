<?php
    require '../../modelo/modelo_historial.php';
    $MH = new Modelo_Historial();//instanciamos
    $consulta = $MH->listar_servicio_combo();
        echo json_encode($consulta);
?>
