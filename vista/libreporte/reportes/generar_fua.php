<?php
// condicion de inicio de sesion
session_start();
if(!isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../../../Login/index.php');
}


?>


<?php
require_once __DIR__ . '/../vendor/autoload.php';

require_once '../../../conexion_reportes/r_conexion.php';
$consulta = " SELECT
fua.fua_id, 
consulta.consulta_descripcion, 
consulta.consulta_diagnostico, 
cita.cita_descripcion, 
cliente.cliente_nombre, 
cliente.cliente_apepat, 
cliente.cliente_apemat, 
cliente.cliente_direccion, 
cliente.cliente_movil, 
cliente.cliente_nrodocumento, 
cliente.cliente_modelo, 
especialidad.especialidad_id, 
especialidad.especialidad_nombre
FROM
fua
INNER JOIN
consulta
ON 
    fua.consulta_id = consulta.consulta_id
INNER JOIN
cita
ON 
    consulta.cita_id = cita.cita_id
INNER JOIN
cliente
ON 
    cita.cliente_id = cliente.cliente_id
INNER JOIN
especialidad
ON 
    cita.especialidad_id = especialidad.especialidad_id where fua.fua_id ='".$_GET['id']."'";
$resultado=$mysqli->query($consulta);
while($row=$resultado->fetch_assoc()){
   $html='<div style="text-align:center"><h1>REPORTE DE FUA</h1>'
   <spam></spam> 
}
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
$mpdf->WriteHTML($html);
$mpdf->Output();