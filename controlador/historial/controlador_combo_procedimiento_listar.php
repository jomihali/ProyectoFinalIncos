<?php
    require '../../modelo/modelo_historial.php';
    $MH = new Modelo_Historial();//instanciamos
    $consulta = $MH->listar_procedimiento_combo();
        echo json_encode($consulta);
?>
