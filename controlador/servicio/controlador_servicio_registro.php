<?php

    require '../../modelo/modelo_servicio.php';
    $MM = new Modelo_Servicio();
    $servicio = htmlspecialchars($_POST['se'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');
    $consulta = $MM->Registrar_Servicio($servicio,$estatus);
    echo $consulta;
  
?>
