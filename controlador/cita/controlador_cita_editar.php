<?php 
  require'../../modelo/modelo_cita.php';
  $MC = new Modelo_Cita();
  $idcita = htmlspecialchars($_POST['idcita'],ENT_QUOTES,'UTF-8');
  $idcliente = htmlspecialchars($_POST['idpa'],ENT_QUOTES,'UTF-8');
  $idtecnico = htmlspecialchars($_POST['iddo'],ENT_QUOTES,'UTF-8');
  $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
  $idespecialidad = htmlspecialchars($_POST['idespecialidad'],ENT_QUOTES,'UTF-8');
  $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
  $consulta = $MC->Editar_Cita($idcita,$idcliente,$idtecnico,$descripcion,$idespecialidad,$estatus);
  echo $consulta;
?>