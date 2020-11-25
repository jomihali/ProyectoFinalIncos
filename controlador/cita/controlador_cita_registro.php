<?php 
  require'../../modelo/modelo_cita.php';
  $MC = new Modelo_Cita();
  $idcliente = htmlspecialchars($_POST['idpa'],ENT_QUOTES,'UTF-8');
  $idtecnico = htmlspecialchars($_POST['iddo'],ENT_QUOTES,'UTF-8');
  $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
  $especialidad = htmlspecialchars($_POST['especialidad'],ENT_QUOTES,'UTF-8');
  $idusuario = htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
  $consulta = $MC->Registrar_Cita($idcliente,$idtecnico,$descripcion,$especialidad,$idusuario);
  
  echo $consulta;
?>