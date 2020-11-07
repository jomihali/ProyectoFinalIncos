<?php

    require '../../modelo/modelo_servicio.php';
    $MM = new Modelo_Servicio();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $servicioactual = htmlspecialchars($_POST['seac'],ENT_QUOTES,'UTF-8');
    $servicionuevo = htmlspecialchars($_POST['senu'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['es'],ENT_QUOTES,'UTF-8');
    $consulta = $MM->Modificar_Servicio($id,$servicioactual,$servicionuevo,$estatus);
    echo $consulta;
  
?>
