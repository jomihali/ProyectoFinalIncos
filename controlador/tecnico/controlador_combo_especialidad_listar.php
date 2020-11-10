<?php
    require '../../modelo/modelo_tecnico.php';
    $MM = new Modelo_Tecnico();//instanciamos
    $consulta = $MM->listar_especialidad_combo();
        echo json_encode($consulta);
?>
