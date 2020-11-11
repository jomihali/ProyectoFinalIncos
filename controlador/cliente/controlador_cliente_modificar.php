<?php

require '../../modelo/modelo_cliente.php';
$MP = new Modelo_Cliente();//instanciamos
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nombres = htmlspecialchars($_POST['nombres'],ENT_QUOTES,'UTF-8');
    $apepat = htmlspecialchars($_POST['apepat'],ENT_QUOTES,'UTF-8');
    $apemat = htmlspecialchars($_POST['apemat'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $movil = htmlspecialchars($_POST['movil'],ENT_QUOTES,'UTF-8');
    $modelo = htmlspecialchars($_POST['modelo'],ENT_QUOTES,'UTF-8');
    $ndoactual = htmlspecialchars($_POST['ndoactual'],ENT_QUOTES,'UTF-8');
    $ndocnuevo = htmlspecialchars($_POST['ndocnuevo'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Modificar_Cliente($id,$nombres,$apepat,$apemat,$direccion,$movil,$modelo,$ndoactual,$ndocnuevo,$estatus);
    echo $consulta;
  
?>