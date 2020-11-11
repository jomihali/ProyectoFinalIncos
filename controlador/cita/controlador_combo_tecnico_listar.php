<?php
    require '../../modelo/modelo_cita.php';
    $MC = new Modelo_Cita();//instanciamos
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $consulta = $MC->listar_tecnico_combo($id);
        echo json_encode($consulta);
?>
