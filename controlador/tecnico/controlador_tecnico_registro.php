<?php
    require '../../modelo/modelo_tecnico.php';

    $MM = new Modelo_Tecnico();
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $apepat = htmlspecialchars($_POST['apepat'],ENT_QUOTES,'UTF-8');
    $apemat = htmlspecialchars($_POST['apemat'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $fenac = htmlspecialchars($_POST['fenac'],ENT_QUOTES,'UTF-8');
    $nrodocumento = htmlspecialchars($_POST['nrodocumento'],ENT_QUOTES,'UTF-8');
    $especialidad = htmlspecialchars($_POST['especialidad'],ENT_QUOTES,'UTF-8');
    $movil = htmlspecialchars($_POST['movil'],ENT_QUOTES,'UTF-8');
    $usu = htmlspecialchars($_POST['usu'],ENT_QUOTES,'UTF-8');
    $contra = password_hash($_POST['contra'],PASSWORD_DEFAULT,['cost'=>10]);
    $rol = htmlspecialchars($_POST['rol'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $consulta = $MM->Registrar_Tecnico($nombre,$apepat,$apemat,$direccion,$sexo,$fenac,$nrodocumento,$especialidad,$movil,$usu,$contra,$rol,$email);
    echo $consulta;

?> 