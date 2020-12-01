  <?php

    require '../../modelo/modelo_historial.php';
    $MH = new Modelo_Historial();
  $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
  $idservicio = htmlspecialchars($_POST['idservicio'],ENT_QUOTES,'UTF-8');

  $arreglo_servicio = explode(",",$idservicio);//aqui separamos el dato por la coma
  for($i=0; $i<count($arreglo_servicio);$i++){
      $consulta = $MH->Registrar_Detalle_Servicio($id,$idservicio,$arreglo_servicio[$i]);
  }

  echo $consulta;
  ?>