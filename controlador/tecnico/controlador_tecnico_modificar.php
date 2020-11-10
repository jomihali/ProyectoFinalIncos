<?php
    require '../../modelo/modelo_tecnico.php';

    $MM = new Modelo_Tecnico();
    $idtecnico = htmlspecialchars($_POST['idtecnico'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $apepat = htmlspecialchars($_POST['apepat'],ENT_QUOTES,'UTF-8');
    $apemat = htmlspecialchars($_POST['apemat'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $movil = htmlspecialchars($_POST['movil'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $fenac = htmlspecialchars($_POST['fenac'],ENT_QUOTES,'UTF-8');
    $nrodocumentoactual = htmlspecialchars($_POST['nrodocumentoactual'],ENT_QUOTES,'UTF-8');
    $nrodocumentonuevo = htmlspecialchars($_POST['nrodocumentonuevo'],ENT_QUOTES,'UTF-8');
    $especialidad = htmlspecialchars($_POST['especialidad'],ENT_QUOTES,'UTF-8');
    $idusuario = htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $consulta = $MM-Modificar_Tecnico($idtecnico,$nombre,$apepat,$apemat,$direccion,$movil,$sexo,$fenac,$nrodocumentoactual,$nrodocumentonuevo,$especialidad,$idusuario,$email);
    echo $consulta;

?>