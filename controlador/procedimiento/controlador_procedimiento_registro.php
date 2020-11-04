<?php

    require '../../modelo/modelo_procedimiento.php';
    $MU = new Modelo_Procedimiento();
    $procedimiento = htmlspecialchars($_POST['p'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->Registrar_Procedimiento($procedimiento,$estatus);
    echo $consulta;
  
?>
