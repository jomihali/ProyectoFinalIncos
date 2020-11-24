<?php

require '../../modelo/modelo_cliente.php';
$MP = new Modelo_Cliente();//instanciamos
    $nombres = htmlspecialchars($_POST['nombres'],ENT_QUOTES,'UTF-8');
    $apepat = htmlspecialchars($_POST['apepat'],ENT_QUOTES,'UTF-8');
    $apemat = htmlspecialchars($_POST['apemat'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $movil = htmlspecialchars($_POST['movil'],ENT_QUOTES,'UTF-8');
    $modelo = htmlspecialchars($_POST['modelo'],ENT_QUOTES,'UTF-8');
    $nrodoc = htmlspecialchars($_POST['nrodoc'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Registrar_Cliente($nombres,$apepat,$apemat,$direccion,$movil,$modelo,$nrodoc);
    echo $consulta;
  
?> 
