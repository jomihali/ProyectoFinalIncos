<?php 
   require '../../modelo/modelo_consulta.php';
   $MC = new Modelo_Consulta();//instanciamos
  $idcliente = htmlspecialchars($_POST['idcliente'],ENT_QUOTES,'UTF-8');
  $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
  $diagnostico = htmlspecialchars($_POST['diagnostico'],ENT_QUOTES,'UTF-8');
  $consulta = $MC->Registrar_Consulta($idcliente,$descripcion,$diagnostico);
  
  echo $consulta;
?>