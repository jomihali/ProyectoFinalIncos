<?php
require_once __DIR__ . '/../vendor/autoload.php';

require_once '../../../conexion_reportes/r_conexion.php';
$consulta = "SELECT
cita.cita_id, 
cita.cita_nroatencion, 
cita.cita_feregistro, 
CONCAT_WS(' ',tecnico.tecnico_nombre,tecnico.tecnico_apepat,tecnico.tecnico_apemat)AS tecnico,
CONCAT_WS(' ',cliente.cliente_nombre,cliente.cliente_apepat,cliente.cliente_apemat) AS cliente, 
cita.cita_descripcion, 
especialidad.especialidad_nombre
FROM
cita
INNER JOIN
tecnico
ON 
    cita.tecnico_id = tecnico.tecnico_id
INNER JOIN
cliente
ON 
    cita.cliente_id = cliente.cliente_id
INNER JOIN
especialidad
ON 
    tecnico.especialidad_id = especialidad.especialidad_id
    WHERE cita_id='".$_GET['id']."'";

$html.="<h2 style='font-size:18px;'>DATOS DE LA CITA</h2>";
$resultado=$mysqli->query($consulta);
while($row=$resultado->fetch_assoc()){
    $html.="<b>N&uacute;mero de atenci&oacute;n:</b>".$row['cita_nroatencion']."
    <br><br><b>Cliente:</b><br>".$row['cliente']."
    <br><b>Tecnico:</b><br>".$row['tecnico']."
    <br><b>Especialidad:</b><br>".$row['especialidad_nombre']."
    <br><b>Descripci&oacute;n:</b><br>".$row['cita_descripcion']."
    <br><b>Fecha:</b><br>".$row['cita_feregistro']."
    .....................................
    <h4>PCBOX & ZONAMAC</h4>
    Gracias por tu confianza!

    ";
}
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 150]]);
$mpdf->WriteHTML($html);
$mpdf->Output();